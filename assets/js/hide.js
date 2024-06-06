const alerts = document.querySelectorAll('.alert') ;

alerts.forEach(msg =>{

    setTimeout(function(){
        // msg.style.display = "none" ;

        let currentUrl = window.location.href ;

        let newUrl =  currentUrl.replace('?deleted' , '') ;

        window.location.href = newUrl ;

    }, 2000)

})


const delbtns  = document.querySelectorAll('.del') ;

delbtns.forEach(delbtn => {
    delbtn.addEventListener('click' , (e)=>{
    
        e.preventDefault() ;
        let userchoice = confirm("Are you sure?") ;
        
        if(userchoice){
           window.location.href = delbtn.getAttribute("href");
    
        }
    
    })
})

