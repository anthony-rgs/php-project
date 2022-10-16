import Verification from './auth/lib/Verification.js'
console.log('test')
const form = document.querySelector('.form')

form.addEventListener('submit', (e) => {
  e.preventDefault()

  Verification.inject(
    Verification.verify('.input--text', {
      allowEmpty: false,
    }),
    '.error--text',
  )

  let verificationCounter = 0
  const inputs = document.querySelectorAll('.input')
  for (let i = 0; i < inputs.length; i++) {
    if (!inputs[i].classList.contains('input--error')) verificationCounter += 1
  }

  if (verificationCounter === inputs.length) form.submit()
})
