let minimize = false;
function minimizeMenubar() {
    if (minimize === false) {
        document.getElementsByClassName('menu-dashboard')[0].style = 'transform: translateX(-300px);width:0%;transition: 0.5s';
        document.getElementsByClassName('content-dashboard')[0].style = 'width:100%';
        minimize = true;
    }
    else {
        document.getElementsByClassName('menu-dashboard')[0].style = 'transform: translateX(0);width:20%;transition: 0.5s';
        document.getElementsByClassName('content-dashboard')[0].style = 'width:80%';
        minimize = false;
    }
}

function showFunctionSearch() {
    const currentPosition = window.getComputedStyle(document.getElementById('header-search-user-container')).transform.replace(/\w+\(\d+,\s\d+,\s\d,\s\d.\s\d,\s|\)/g,(x)=>"");
    if (currentPosition == -90) {
        document.getElementById('header-search-user-container').style = 'transform: translateY(0px);transition:1s';
    } else {
        document.getElementById('header-search-user-container').style = 'transform: translateY(-90px);transition:1s';
    }
}