var page = window.location.pathname.split("/").pop().split(".")[0];
var aux = window.location.pathname.split("/");
var to_build = aux.includes("pages") ? "../" : "./";
var root = window.location.pathname.split("/");
if (!aux.includes("pages")) {
    page = "dashboard";
}

if (document.querySelector("nav [navbar-trigger]")) {
    loadJS("/js/navbar-collapse.js", true);
}

if (document.querySelector("[data-target='tooltip']")) {
    loadJS("/js/tooltips.js", true);
    loadStylesheet("/styles/tooltips.css");
}

if (document.querySelector("[nav-pills]")) {
    loadJS("/js/nav-pills.js", true);
}

if (document.querySelector("[dropdown-trigger]")) {
    loadJS("/js/dropdown.js", true);
}

if (document.querySelector("[fixed-plugin]")) {
    loadJS("/js/fixed-plugin.js", true);
}

if (document.querySelector("[navbar-main]")) {
    loadJS("/js/sidenav-burger.js", true);
    loadJS("/js/navbar-sticky.js", true);
}

function loadJS(FILE_URL, async) {
    let dynamicScript = document.createElement("script");

    dynamicScript.setAttribute("src", FILE_URL);
    dynamicScript.setAttribute("type", "text/javascript");
    dynamicScript.setAttribute("async", async);

    document.head.appendChild(dynamicScript);
}

function loadStylesheet(FILE_URL) {
    let dynamicStylesheet = document.createElement("link");

    dynamicStylesheet.setAttribute("href", FILE_URL);
    dynamicStylesheet.setAttribute("type", "text/css");
    dynamicStylesheet.setAttribute("rel", "stylesheet");

    document.head.appendChild(dynamicStylesheet);
}
