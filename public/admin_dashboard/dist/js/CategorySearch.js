function start() {
    class CategorySearch {
        constructor() {
            this.selectedCategory = this.loadCategory();
            this.categoryInput = document.querySelector("#categoryInput");
            this.categoryResult = document.querySelector("#category-result");
            this.showSelectedCategory = document.querySelector("#category-selected");
            this.categoryResultDivs = null;

            this.categoryInput.addEventListener('input', () => this.getData(this.categoryInput.value, this.categoryResult));
        }

        loadCategory() {
            let postId = document.querySelector("#post-id");
            if (postId) {
                try {
                    APIService.getCategoryForPost(postId.value).then(data => {
                        let div = document.createElement("div");
                        div.textContent = data["name_category"];
                        this.setCategory(div);
                    })
                } catch (error) {
                    console.log(error);
                }
            }
            return null;
        }

        async getData(inputValue, resultDiv) {
            if (inputValue.length < 2) return resultDiv.innerHTML = "";
            resultDiv.innerHTML = "Loading result";
        
            try {
                let data = await APIService.getCategories(inputValue);
                this.insertHTML(data, resultDiv);
            } catch (error) {
                console.log(error);
            }
        }

        insertHTML(res, resultDiv) {
            let html = "";
            if (res.length === 0) {
                resultDiv.innerHTML = "No result for the search term";
            } else {
                html = res.map(element => `<div>${element.name_category}</div>`).join("");
                resultDiv.innerHTML = html;
                this.addClickResult(resultDiv);
            }
        }

        addClickResult(resultDiv){
            this.categoryResultDivs = resultDiv.querySelectorAll("div");
            this.categoryResultDivs.forEach(element => {
                element.addEventListener("click", (event)=>{this.setCategory(element)})
            });
        }

        setCategory(element){
            this.selectedCategory = element.textContent;
            categoryData.data = this.selectedCategory;
            this.showSelectedCategory.innerHTML = `<span class="badge rounded-pill bg-info">${element.textContent}</span><em>Search and press on the category result to change category</em>`;
            this.colorSetedCategory(element);
        }
        
        colorSetedCategory(element){
            if(this.categoryResultDivs === null) return;
            this.categoryResultDivs.forEach((element)=>{
                element.style.backgroundColor = "";
            });
            element.style.backgroundColor = "tomato";
        }

    }
    new CategorySearch();
}
start();
let categoryData = {
    data: null
}