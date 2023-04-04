let $password1 = document.getElementById('pass1')
let $password2 = document.getElementById('pass2')
let $pass2message = document.getElementById('pass2message')
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
if ($password2 != null) {
  $password2.addEventListener('keydown', () => {
    clearTimeout(timeout)
    timeout = setTimeout(() => {
      if ($password1.value == $password2.value) {
        $pass2message.classList.replace('d-block', 'd-none')
      } else {
        $pass2message.classList.replace('d-none', 'd-block')
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
    $asidedashboard.style.removeProperty('width')
    $contentaside1.classList.remove('d-none')
    $contentbtnnav.classList.replace('d-block', 'd-none')
    $btnlinkdashboard.classList.remove('d-none')
    $btnlinksiconosdashboard.classList.replace('d-block', 'd-none')
    $aside = true
  })
}
