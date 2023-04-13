let $password = document.getElementById('password')
let $repeatpassword = document.getElementById('repeat_password')
let $repeatpasswordmessage = document.getElementById('repeat_password_message')
let $btncloseaside = document.getElementById('btn_close_aside')
let $asidedashboard = document.getElementById('aside_dashboard')
let $contentaside1 = document.getElementById('content_aside_1')
let $contentbtnnav = document.getElementById('content-btn-nav')
let $btnopenaside = document.getElementById('btn_open_aside')
let $btnlinkdashboard = document.getElementById('btn_link_dashboard')
let $btnlinksiconosdashboard = document.getElementById(
  'btn_links_iconos_dashboard',
)

let timeout
// Passwords iguales
if ($repeatpassword != null) {
  $repeatpassword.addEventListener('keydown', () => {
    clearTimeout(timeout)
    timeout = setTimeout(() => {
      if ($password.value == $repeatpassword.value) {
        $repeatpasswordmessage.classList.replace('d-block', 'd-none')
      } else {
        $repeatpasswordmessage.classList.replace('d-none', 'd-block')
      }
      clearTimeout(timeout)
    }, 1000)
  })
}
// Cerrar menu dashboard
if ($btncloseaside != null) {
  $btncloseaside.addEventListener('click', () => {
    $asidedashboard.style = 'width:80px'
    $contentaside1.classList.add('d-none')
    $contentbtnnav.classList.replace('d-none', 'd-block')
    $btnlinkdashboard.classList.add('d-none')
    $btnlinksiconosdashboard.classList.replace('d-none', 'd-block')
    $aside = false
  })
}
// Abrir menu dashboard
if ($btnopenaside != null) {
  $btnopenaside.addEventListener('click', () => {
    $asidedashboard.style = 'width:300px'
    $contentaside1.classList.remove('d-none')
    $contentbtnnav.classList.replace('d-block', 'd-none')
    $btnlinkdashboard.classList.remove('d-none')
    $btnlinksiconosdashboard.classList.replace('d-block', 'd-none')
    $aside = true
  })
}
