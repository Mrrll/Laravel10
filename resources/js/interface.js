let $password1 = document.getElementById("pass1")
let $password2 = document.getElementById("pass2")
let $pass2message = document.getElementById("pass2message")
let timeout

$password2.addEventListener('keydown', () => {
  clearTimeout(timeout)
  timeout = setTimeout(() => {
    if ($password1.value == $password2.value) {
        $pass2message.classList.replace("d-block", "d-none")
    } else {
        $pass2message.classList.replace("d-none", "d-block")
    }
    clearTimeout(timeout)
  },1000)
})
