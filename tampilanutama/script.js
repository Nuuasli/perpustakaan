const optionMenu = document.querySelector('.select-menu'),
  selectBtn = optionMenu.querySelector('.select-btn'),
  options = optionMenu.querySelectorAll('.option'),
  sBtn_text = optionMenu.querySelector('.sBtn-text');

selectBtn.addEventListener('click', () => optionMenu.classList.toggle('active'));

options.forEach((option) => {
  option.addEventListener('click', () => {
    let selectedOption = option.querySelector('.option-text').innerText;
    sBtn_text.innerText = selectedOption;

    optionMenu.classList.remove('active');
  });
});

// Get the video
var video = document.getElementById('myVideo');

// Get the button
var btn = document.getElementById('myBtn');

// Pause and play the video, and change the button text
function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = 'Pause';
  } else {
    video.pause();
    btn.innerHTML = 'Play';
  }
}
