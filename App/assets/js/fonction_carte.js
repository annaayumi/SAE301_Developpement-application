function toggleFilter(filterID,checkboxID){

    targetFilter = document.getElementById(filterID)
    targetCheckbox = document.getElementById(checkboxID)
    console.log(targetFilter);

    if(targetFilter.getAttribute("hidden")){
        targetFilter.removeAttribute("hidden")
        targetCheckbox.removeAttribute("hidden")
        targetCheckbox.removeAttribute("disabled")
    }
    else{
        targetFilter.setAttribute("hidden","TRUE")
        targetCheckbox.setAttribute("hidden","TRUE")
        targetCheckbox.setAttribute("disabled","TRUE")
    }
}