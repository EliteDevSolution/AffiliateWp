var socialName = "";

$(window).on('load', function () {
    $('.selectable').first().trigger('click');
});

$(document).ready(function () {
    $('.selectable').on('click', function () {
        // Remove 'selected' class from all images
        $('.selectable').removeClass('selected');
        // Add 'selected' class to the clicked image
        $(this).addClass('selected');
        $('.card-img-top').attr('src', $(this).find('img').attr('src'));
    });

    $('div.social-connected').click(function () {
        socialName = $(this).attr('id');
        console.log(socialName);
        $('div.social-connected').removeClass('connector-selected');
        $('div.social-connected').find('div.social-icon-approved').remove();
        $(this).addClass('connector-selected');
        $(this).find('div.social-card-icon').append(
            `<div class="social-icon-approved"><img alt="" src="${socialApprovedIconUrl}"></div>`
        );
    });
});

function getCurrentDate() {
    const today = new Date(); // Get the current date
    const year = today.getFullYear(); // Get the full year (YYYY)
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Get the month (MM), add 1 (months are 0-indexed)
    const day = String(today.getDate()).padStart(2, '0'); // Get the day (DD)

    const currentData = `${year}-${month}-${day}`; // Format as YYYY-MM-DD
    return currentData; // Return the formatted date
}


let generateScheduleTime = () => {
    var currentServertime;
    var currentDate = getCurrentDate();

    var scheduleTime = Math.floor(Math.random() * 24); // 0 to 23

    console.log("currentDate====>", currentDate);
    console.log("scheduleDate===>", scheduleDate);

    if (currentDate == scheduleDate) {
        $.ajax({
            type: "POST",
            url: 'get-servertime',
        }).done(function (response) {
            currentServertime = response['server_time'];

            var scheduleTimeNum = Number(scheduleTime);
            var currentServertimeNum = Number(currentServertime);

            if (currentServertimeNum > scheduleTimeNum) {
                scheduleTime = currentServertimeNum + 1; // Update scheduleTime to be greater than currentServertime
            }
            return scheduleTime;

        }).fail(function (xhr, textStatus, errorThrown) {
        });
    }
    return scheduleTime;
}
