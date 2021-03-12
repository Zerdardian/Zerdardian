var imgArray = [
    'assets/pictures/vegas170_OdWiB7LMPW.png',
    'assets/pictures/025f10cadb7d78cd2d751dee83e8c124.jpg',
],
idx = 0,
imgDuration = 1700;

function slideShow(whichDiv) {
    let dv = document.getElementById(whichDiv);

    dv.style.backgroundImage = "url(" + imgArray[idx] + ")";
    idx++;
    if (idx == imgArray.length) {
        idx = 0;
    }

    setTimeout(slideShow, imgDuration, whichDiv);
}

slideShow('background-picture');