const img = document.querySelector("#logoImg")
                let count = 0
                img.addEventListener("click",function(){
                count++
                if(count %10 == 0){
                    img.src = "easterEgg.jpg"
                }
                if(count %15 == 0){
                    //img.style.position = "absolute"
                    img.style.maxWidth = "100em"
                    img.style.maxHeight = "100em"
                    img.style.Width = "100em"
                    img.style.height = "100em"
                    img.style.transition = "3s"
                    img.style.rotate = "360deg"
 
                }

                if(count  %20 == 0){
                    img.style.position = "none"
                    img.style.maxWidth = "70px"
                    img.style.maxHeight = "70px"
                    img.style.rotate = "0deg"
                }
                if(count  %21 == 0){
                    img.src = "assets/img/logo.png"
                }
                

                })
