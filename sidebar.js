var openbtn = document.getElementById("openbtn");
var sidebar = document.getElementById("sidebar");

openbtn.addEventListener("click", function() {
    if (sidebar.style.width === "250px") {
        sidebar.style.width = "0";
        openbtn.style.marginLeft = "0";
    } else {
        sidebar.style.width = "250px";
        openbtn.style.marginLeft = "250px";
    }
});
