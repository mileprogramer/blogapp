class APIService
{

    static getTags(tagName){
        return new Promise((resolve, reject)=>{
            let xhr = new XMLHttpRequest();
            xhr.open("GET", `http://127.0.0.1:8000/api/tags?tag_name=${tagName}`);
            xhr.send();
            xhr.addEventListener("readystatechange", function(){
                if(xhr.readyState === 4 && xhr.status === 200){
                    resolve(JSON.parse(xhr.responseText));
                }
                else if(xhr.readyState === 4 && xhr.status > 300){
                    reject(xhr.responseText);
                }
            })
        })
    }

    static getCategories(categoryName){
        return new Promise((resolve, reject)=>{
            let xhr = new XMLHttpRequest();
            xhr.open("GET", `http://127.0.0.1:8000/api/categories?name_category=${categoryName}`);
            xhr.send();
            xhr.addEventListener("readystatechange", function(){
                if(xhr.readyState === 4 && xhr.status === 200){
                    resolve(JSON.parse(xhr.responseText));
                }
                else if(xhr.readyState === 4 && xhr.status > 300){
                    reject(xhr.responseText);
                }
            })
        })
    }
}