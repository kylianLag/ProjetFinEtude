const img = document.querySelector("#logoImg")
                let count = 0
                img.addEventListener("click",function(){
                count++
                if(count == 10){
                    img.src = "easterEgg.jpg"
                }
                if(count ==15){
                    img.style.position = "absolute"
                    img.style.width = "100em"
                    img.style.height = "100em"

                }
                })
