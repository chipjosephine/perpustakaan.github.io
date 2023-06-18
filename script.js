const body = document.querySelector('body'),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box");

    toggle.addEventListener("click" , () =>{
        sidebar.classList.toggle("close");
    });

let arrow = document.querySelectorAll(".arrow");
    arrow.addEventListener("click" , (e) =>{
    let arrowParent = e.target.parentElement.parentElement;
    console.log(arrowParent);
    });

