function start(){

    let btnAddPost = document.getElementById("addPostBtn");
    let btnEditPost = document.getElementById("editPostBtn");
    let alertMistake = document.querySelector(".alert-danger");
    let alertSuccess = document.querySelector(".alert-success");
    (btnAddPost === null)? btnEditPost.addEventListener("click", editPost) : btnAddPost.addEventListener("click", addPost);


    function addPost(event){
        event.preventDefault();
        let postData = collectData();
        let fd = new FormData();
        fd.append("category", postData.category);
        fd.append("tags", postData.tags);
        fd.append("title", postData.title.value);
        fd.append("body", postData.body.value);
        fd.append("slug", postData.slug.value);

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

    function editPost(event){
        event.preventDefault();
        let postData = collectData();
        let fd = new FormData();
        fd.append("postId", parseInt(document.querySelector("#post-id").value))
        fd.append("category", postData.category);
        fd.append("tags", postData.tags);
        fd.append("title", postData.title.value);
        fd.append("body", postData.body.value);
        fd.append("slug", postData.slug.value);

        APIService.editPost(fd, postData.csrfToken)
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

    function collectData(){
        let category = categoryData.data;
        let tags = tagsSelected.data;
        let tagsSelectedDiv = document.getElementById("tags-selected");
        let categorySelectedDiv = document.getElementById("category-selected");
        let title = document.getElementById("title");
        let body = document.getElementById("body");
        let slug = document.getElementById("slug");
        let csrfToken = document.querySelector("input[name='_token']").value;
        return {
            category: category,
            tags: tags,
            tagsSelectedDiv: tagsSelectedDiv,
            categorySelectedDiv: categorySelectedDiv,
            title: title,
            body: body,
            slug: slug,
            csrfToken: csrfToken,
        }
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

