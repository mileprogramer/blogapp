function start(){

    class TagSearch {
        constructor() {
            this.selectedTags = this.loadTags();
            this.postId = document.querySelector("#post-id");
            this.tagsInput = document.querySelector("#tagsInput");
            this.tagsResult = document.querySelector("#tags-result");
            this.addedTags = document.querySelector("#tags-selected");
            this.searchedResult = null;
    
            this.tagsInput.oninput = () => this.getData(this.tagsInput, this.tagsResult, 'tags');
        }
        
        loadTags(){
            if(this.postId){
                try {
                    APIService.getTagsForPost().then((data)=> this.selectedTags = data);
                } catch (error) {
                    console.log(error);
                }
            }
            return [];
        }
    
        async getData(input, resultDiv, dataActive) {
            this.setStyleResultDiv(input.value, resultDiv);
            if (input.value.length < 2) return;
    
            try {
                let data;
                if (dataActive === 'tags') {
                    data = await APIService.getTags(input.value);
                    
                } else if (dataActive === 'category') {
                    data = await APIService.getCategories(input.value);
                }
                this.insertHTML(data, resultDiv);
            } catch (error) {
                console.log(error);
            }
        }

        setStyleResultDiv(inputValue, resultDiv){

            if(inputValue === ""){
                resultDiv.style.display = "none";
                resultDiv.innerHTML = "";
                return;
            }
            resultDiv.style.display = "block";
            resultDiv.innerHTML = "Loading result";
        }
    
        insertHTML(res, resultDiv) {
            let html = ``;
            if (res.length === 0) {
                resultDiv.innerHTML = "No result for the search term";
                return;
            }
            res.forEach(element => {
                html += `
                    <div>${element.tag_name}</div>
                `;
            });
            resultDiv.innerHTML = html;
            this.selectSearchedResult(resultDiv);
        }
    
        selectSearchedResult(resultDiv) {
            this.searchedResult = resultDiv.querySelectorAll("div");
            this.addClickResult();
            this.colorResult();
        }
    
        addClickResult() {
            this.searchedResult.forEach(div => {
                div.onclick = () => this.addTag(div.textContent);
            });
        }
    
        addTag(textContent) {
            // addTag can add or delete depends on is in array tag
            let position = this.selectedTags.indexOf(textContent);
            if (position === -1) {
                this.selectedTags.push(textContent);
                this.setAddedTags();
                tagsSelected.data = [...this.selectedTags];
            } else {
                this.selectedTags.splice(position, 1);
                this.setAddedTags();
                tagsSelected.data = [...this.selectedTags];
            }
            this.colorResult();
        }

        setAddedTags(){
            let html = ``;
            for(let i = 0; i<this.selectedTags.length; i++){
                html += `<span class="badge bg-info">${this.selectedTags[i]}</span>`
            }
            this.addedTags.innerHTML = "";
            this.addedTags.innerHTML = html + "<em>To remove one tag clik on that tag</em>";
            this.addClickTags();
        }

        addClickTags(){
            let elements = document.querySelectorAll("#tags-selected span");
            elements.forEach(element =>{
                element.addEventListener("click", (event) => this.removeTag(element));
            })
        }

        colorResult(divElements = this.tagsResult.querySelectorAll("div")){
            for(let i = 0; i<divElements.length; i++){
                if(this.selectedTags.includes(divElements[i].textContent)){
                    divElements[i].style.backgroundColor = "tomato";
                }
                else{
                    divElements[i].style.backgroundColor = "";
                }
            }
        }

        removeTag = (element) =>{
            this.addTag(element.textContent);
        }
    }
    new TagSearch();
    
}
start();
let tagsSelected = {
    data: []
};
