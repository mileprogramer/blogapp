function start(){

    let btnAddPost = document.getElementById("addPostBtn");
    let alertMistake = document.querySelector(".alert-danger");
    let alertSuccess = document.querySelector(".alert-success");
    btnAddPost.addEventListener("click", addPost);

    function addPost(event){
        event.preventDefault();
        let category = categoryData.data;
        let tags = tagsSelected.data;
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
            alertSuccess.innerHTML = `<li>${data}</li>`;
        })
        .catch((error)=>{
            if(alertMistake.classList.contains("d-none")){
                alertMistake.classList.remove("d-none");
            }
            alertMistake.innerHTML = `<li>${error}</li>`;
        });
    }
}
start();

