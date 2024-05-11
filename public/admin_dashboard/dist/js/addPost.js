(function(){

    let selectedTags = [];
    let selectedCategory = [];

    let tagsInput = document.querySelector("#tagsInput");
    let categoryInput = document.querySelector("#categoryInput");

    let tagsResult = document.querySelector("#tags-result");
    let categoryResult = document.querySelector("#category-result");

    let searchedResult = null;

    tagsInput.oninput = function(){
        getData(tagsInput, tagsResult);
    }

    categoryInput.oninput = function(){
        getData(categoryInput, categoryResult);
    }

    function getData(input, resultDiv){
        resultDiv.innerHTML = "Loading result";
        if(input.value < 2) return ;
        try{
            if(input.getAttribute("data-active") === "tags"){
                APIService.getTags(input.value)
                .then((data)=>{

                    insertHTML(data, resultDiv);
                })
            }
            else if(input.getAttribute("data-active") === "category"){
                APIService.getCategories(input.value)
                .then((data)=>{
                    insertHTML(data, resultDiv);
                })
            }
        }   
        catch(error){
            console.log(error);
        }
    }

    function insertHTML(res, resultDiv){
        let html = ``;
        if(res.length === 0){
            return resultDiv.innerHTML = "No result for the search term";
        } 
        res.forEach(element => {
            html += `
                <div>${element["tag_name"]}</div>
            `
        });
        resultDiv.innerHTML = html;
        selectSearchedResult(resultDiv.id);
        
    }

    function selectSearchedResult(resultDivId){
        searchedResult = document.querySelectorAll("#"+resultDivId+" div");
        addClickResult(searchedResult);
    }

    function addClickResult(searchedResult){
        for(let i = 0; i<searchedResult.length; i++){
            searchedResult[i].onclick = addTagOrCategory;
        }
    }

    function addTagOrCategory(){
        let position = selectedTags.indexOf(this.textContent);
        if(position === -1){
            this.style.backgroundColor = "tomato";
            selectedTags.push(this.textContent);
        }
        else{
            selectedTags.splice(position, 1);
            this.style.backgroundColor = "white";
        }
        
    }
})()

