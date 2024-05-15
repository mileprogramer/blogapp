function start(){

    let btnAddPost = document.getElementById("addPostBtn");
    let alertMistake = document.querySelector(".alert-danger");
    let alertSuccess = document.querySelector(".alert-success");
    btnAddPost.addEventListener("click", addPost);

    function addPost(event){
        event.preventDefault();
        let category = categoryData.data;
        let tags = tagsSelected.data;
        let tagsSelectedDiv = document.getElementById("tags-selected");
        let categorySelectedDiv = document.getElementById("category-selected");
        let title = document.getElementById("title");
        let body = document.getElementById("body");
        let slug = document.getElementById("slug");
        let csrfToken = document.querySelector("input[name='_token']").value;

        let fd = new FormData();
        fd.append("category", category);
        fd.append("tags", tags);
        fd.append("title", title.value);
        fd.append("body", body.value);
        fd.append("slug", slug.value);

        APIService.addPost(fd, csrfToken)
        .then((data)=>{
            if(alertSuccess.classList.contains("d-none")){
                alertSuccess.classList.remove("d-none");
            }
            if(data.success){
                console.log(data.success);
                alertSuccess.innerHTML = `<li>${data.success}</li>`;
                alertMistake.innerHTML = ``;
                alertMistake.classList.add("d-none");
                emptyInputData({
                    title,
                    body,
                    slug
                });
                clearTagsCategory(tagsSelectedDiv, categorySelectedDiv);
                dispearAlert(alertSuccess);
            }
        })
        .catch((error)=>{
            if(alertMistake.classList.contains("d-none")){
                alertMistake.classList.remove("d-none");
            }
            alertMistake.innerHTML = `<li>${error}</li>`;
        });
    }

    function emptyInputData(inputFields){
        for(let input in inputFields){
            inputFields[input].value = "";
        }
    }   

    function dispearAlert(alert){
        setTimeout(()=>{
            alert.innerHTML = "";
            alert.classList.remove("d-none");
        }, 3000);
    }

    function clearTagsCategory(tagsDiv, categoryDiv){
        categoryData.data = null;
        tagsSelected.data = [];
        tagsDiv.innerHTML = "";
        categoryDiv.innerHTML = "";
    }

}
start();

