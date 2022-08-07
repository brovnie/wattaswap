let fleshMessage = document.querySelector('.alert');

if(fleshMessage) {
    setTimeout(() => {    
        // 👇️ removes element from DOM
        fleshMessage.classList.add("hide");
      }, 6000);
}