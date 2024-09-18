function allowDrop(event) {
    event.preventDefault();
}

function drag(event) {
    // Store the image source URL instead of the element ID
    event.dataTransfer.setData("src", event.target.src);
}

function drop(event) {
    event.preventDefault();

    // Get the image source URL that was dragged
    var draggedImgSrc = event.dataTransfer.getData("src");

    // Check if the target is a calendar cell (DIV) to change the background
    if (event.target.tagName === 'DIV') {
        // Set the background-image of the calendar cell
        event.target.style.backgroundImage = `url(${draggedImgSrc})`;
        event.target.style.backgroundSize = 'contain';  // Adjust the background size
        event.target.style.backgroundRepeat = 'no-repeat';  // Prevent repeating the background image
        event.target.style.backgroundPosition = 'center';  // Center the image in the calendar cell
    }
}



var pickedYear = 0;
var pickedMonth = 0;
var pickedMonthStr = '';
var pickedMonthBaseStr = '';
var pickedDay = 0;

const isLeapYear = (year) => {
    return (
        (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
        (year % 100 === 0 && year % 400 === 0)
    );
};
const getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
};
let calendar = document.querySelector('.calendar');
const month_names = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
];
const month_picker = document.querySelector('#month-picker');
const dayTextFormate = document.querySelector('.day-text-formate');
const timeFormate = document.querySelector('.time-formate');
const dateFormate = document.querySelector('.date-formate');

month_picker.onclick = () => {
    month_list.classList.remove('hideonce');
    month_list.classList.remove('hide');
    month_list.classList.add('show');
    dayTextFormate.classList.remove('showtime');
    dayTextFormate.classList.add('hidetime');
    timeFormate.classList.remove('showtime');
    timeFormate.classList.add('hideTime');
    dateFormate.classList.remove('showtime');
    dateFormate.classList.add('hideTime');
};

const generateCalendar = (month, year) => {
    let calendar_days = document.querySelector('.calendar-days');
    calendar_days.innerHTML = '';
    let calendar_header_year = document.querySelector('#year');
    let days_of_month = [
        31,
        getFebDays(year),
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];

    let currentDate = new Date();

    month_picker.innerHTML = month_names[month];
    month_picker.setAttribute('data-value', month + 1);

    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month);

    var listSocialIcons = [
        'facebook_logo.png',
        'instagram_logo.png',
        'linkedin_logo.png',
        'tumblr_logo.png',
        'youtube_logo.png',
        'tweet_social.png'
    ];


    for (let i = 1; i <= listSocialIcons.length; i++) {
        for (let j = 1; j < 9; j++) {
            let day = document.createElement('div');
            day.setAttribute("ondrop", "drop(event)");
            day.setAttribute("ondragover", "allowDrop(event)");
            day.classList.add('current-date');

            if (j % 8 == 1) {
                let img = document.createElement('img');
                img.src = "postflow_assests/images/logos/" + listSocialIcons[i-1];

                img.style.minHeight = '40px';       // Example: Set the width
                img.style.minWidth = '40px';       // Example: Set the width

                day.style.color = 'unset'; // Removes the color
                day.style.border = 'none'; // Removes the border
                day.style.backgroundImage = 'none'; // Removes the background image

                day.appendChild(img);
            }

            calendar_days.appendChild(day);
        }
    }
};

let month_list = calendar.querySelector('.month-list');
month_names.forEach((e, index) => {
    let month = document.createElement('div');
    month.innerHTML = `<div>${e}</div>`;

    month_list.append(month);
    month.onclick = () => {
        currentMonth.value = index;
        generateCalendar(currentMonth.value, currentYear.value);
        month_list.classList.replace('show', 'hide');
        dayTextFormate.classList.remove('hideTime');
        dayTextFormate.classList.add('showtime');
        timeFormate.classList.remove('hideTime');
        timeFormate.classList.add('showtime');
        dateFormate.classList.remove('hideTime');
        dateFormate.classList.add('showtime');
    };
});

(function () {
    month_list.classList.add('hideonce');
})();
document.querySelector('#pre-year').onclick = () => {
    --currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector('#next-year').onclick = () => {
    ++currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};

let currentDate = new Date();
let currentMonth = { value: currentDate.getMonth() };
let currentYear = { value: currentDate.getFullYear() };
generateCalendar(currentMonth.value, currentYear.value);

const todayShowTime = document.querySelector('.time-formate');
const todayShowDate = document.querySelector('.date-formate');

const currshowDate = new Date();
const showCurrentDateOption = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    weekday: 'long',
};
const currentDateFormate = new Intl.DateTimeFormat(
    'en-US',
    showCurrentDateOption
).format(currshowDate);
todayShowDate.textContent = currentDateFormate;
setInterval(() => {
    const timer = new Date();
    const option = {
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
    };
    const formateTimer = new Intl.DateTimeFormat('en-us', option).format(timer);
    let time = `${`${timer.getHours()}`.padStart(
        2,
        '0'
    )}:${`${timer.getMinutes()}`.padStart(
        2,
        '0'
    )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
    todayShowTime.textContent = formateTimer;
}, 1000);