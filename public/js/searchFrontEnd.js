/* SETUP =============================================================================== */

// Makes loading prettier (elements are hidden until the html form in searchFrontEnd.php is loaded)
document.getElementById("nextBtn").style.display = "block";
document.getElementById("prevBtn").style.display = "block";
document.getElementById("steps").style.display = "block";

// x is an array containing every element in searchFrontEnd.php with the "tab" class.
const x = document.getElementsByClassName("tab");

// Current tab is set to be the first tab (0-based indexing)
let currTab = 0;
let numFltrs = 0;

// Display the current tab
showTab();

/* FUNCTION DEFINITIONS ================================================================ */

/**
 * @brief   Displays the specified tab of the form, fixing the Previous/Next buttons
 */
function showTab() {
    // Display the tab
    x[currTab].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (currTab === 0) {
        // Hide Previous button in first tab
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (currTab === (x.length - 1)) {
        // Display Submit button in last tab
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        // If the current tab is not the last tab, display Next button
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // Run a function that displays the correct step indicator:
    fixStepIndicator();
    // Run a function that adjusts options available in select elements based on previous inputs:
    if (currTab === 1) {
        clearFilters();
        fixSelect("fltr0");
    } else if (currTab === 2) {
        fixSelect("columnsToShow");
        //selectAndDisable("columnsToShow");
        resize("columnsToShow");
    }
}

function resize(id) {
    let select = document.getElementById(id);
    select.size = select.length;
}

function selectAndDisable(id) {
    let i, val, opt;
    for (i = 0; i < numFltrs; i++) {
        val = $("#fltr" + i + " option:selected").val();
        // TODO: check that the input is not empty. If so, continue;
        opt = $("#" + id + " option[value='"+ val +"']");
        opt.prop('selected', true);
        opt.prop('disabled', true);
    }
}

/**
 * @brief
 * @param   n   Indicates whether user wants to go to next or previous tab
 */
function nextPrev(n) {
    // Exit the function if any field in the current tab is invalid:
    if (n === 1 && !validateTab()) return false;
    // If you have reached the end of the form... :
    if (currTab + n >= x.length) {
        //...the form gets submitted:
        document.getElementById("search").submit();
        return false;
    }
    // Otherwise, hide the current tab:
    x[currTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currTab += n;
    // Display the correct tab:
    showTab(currTab);
}

/**
 * @brief   Verifies that a tab is "valid" (user provides the required info)
 */
function validateTab() {
    let valid = true;
    if (currTab === 0) {
        // For the first tab, check that at least one table is selected.
        if ($(":checkbox:checked").length < 1) {
            valid = false;
            alert('Please select a table to search over.');
        }
    } else if (currTab === (x.length - 1)) {
        // For the last tab, check that either "All" is selected
        //    or that at least one of the filters is selected.
        if (($(":radio:checked").val() !== "*")
            && ($("#columnsToShow:selected").length === 0)) {
            valid = false;
            alert('Please select at least one column to display.');
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currTab].className += " finish";
    }
    // Return the valid status.
    return valid;
}

/**
 * @brief
 */
function fixStepIndicator() {
    // Remove the "active" class of all steps
    let i, s = document.getElementsByClassName("step");
    for (i = 0; i < s.length; i++) {
        s[i].className = s[i].className.replace(" active", "");
    }
    // Add the "active" class to the current step (corresponds to the current tab):
    s[currTab].className += " active";
}

/**
 * @brief
 * @param   id   The ID of the select to fix
 */
function fixSelect(id) {
    // Save the original select if it hasn't been saved already
    saveOriginalSelect(id);
    // Reset the select (display all options)
    restoreOptions(id);
    // Remove the options that do not belong to the selected tables
    removeOptions(id);

    /*
    TODO
    Notes:
    - To get your SELECT part of your query take the filtered options in step 2 and the selected
    options in step 3
    - To get your FROM, get the selected tables
    - To get your WHERE, get the selected filters and their values
    */
}

/**
 * @brief   Returns the previously selected filters
 * @param   id   The ID of the select to fix
 */
function getPastFilters(id) {
    // Extract filter number from id
    let fltrNum = 0; //TODO: extract filter number from id
    // TODO: instantiate fltrNum-sized array called pastFilters
    let pastFilters = new Array(fltrNum); // placeholder
    let i;
    for (i = 0; i < fltrNum; i++) {
        let fltrID = "fltr" + fltrNum;
        pastFilters[i] = $("#" + fltrID + ":selected"); // TODO: does this work for not multiple?
    }
    return pastFilters;
}

/**
 * @brief   Saves a select element
 * @param   id  The ID of the select to save
 */
function saveOriginalSelect(id) {
    let select = $("#" + id);
    if (select.data("originalSelect") === undefined) {
        console.log("saved select");
        select.data("originalSelect", select.html());
    }
}

/**
 * @brief   Restores a select element's options
 * @param   id  The ID of the select to restore
 */
function restoreOptions(id) {
    let select = $("#" + id);
    let ogSelect = select.data("originalSelect");
    console.log("in restore");
    if (ogSelect !== undefined) {
        console.log("restored");
        select.html(ogSelect);
    }
}

/**
 * @brief   Removes a select element's options based on their class
 * @param   id      The id of the select
 */
function removeOptions(id) {
    let toKeep = "";
    // Go through unselected tables, format and add to string
    $(":checkbox:checked").each(function () {
        toKeep += "." + this.value + ", ";
    });
    // Remove final ", "
    toKeep = toKeep.substring(0, toKeep.length - 2);
    // Remove options
    $("#" + id + " option").filter(function (index) {
        return !($(this).is(toKeep));
    }).remove();
}

/**
 * @brief   Logs the value of every selected checkbox in a form to the console.
 */
function logSelectedCheckboxes() {
    $(":checkbox:checked").each(function () {
        console.log(this.value);
    });
}

/**
 * @brief   Logs the value of every selected checkbox in a form to the console.
 */
function logAllCheckboxes() {
    $(":checkbox").each(function () {
        console.log(this.value);
    });
}

/**
 * @brief   Logs the value of every selected checkbox in a form to the console.
 */
function logUnselectedCheckboxes() {
    $(":checkbox:not(:checked)").each(function () {
        console.log(this.value);
    });
}

/**
 * @brief   Clears all filters except the original
 */
function clearFilters() {
    // Clear the filters
    let i;
    for (i = 1; i <= numFltrs; i++) {
        $("#fltrList" + i).remove();
    }
    // Reset numFltrs
    numFltrs = 0;
}

/**
 * @brief   Adds a filter
 */
function addFilter() {
    // Declare static variable original to keep track of original filter
    if (typeof addFilter.original === 'undefined') {
        addFilter.original = document.getElementById('fltrList0');
    }
    // Create deep clone of original
    let clone = addFilter.original.cloneNode(true);
    // Give the clone a unique ID (i is incremented first)
    clone.id = "fltrList" + ++numFltrs;
    // Give the select element inside the fltrList a unique ID
    clone.getElementsByTagName("select")[0].id = "fltr" + numFltrs;
    // Give the input element inside the fltrList a unique ID
    clone.getElementsByTagName("input")[0].id = "fltrIn" + numFltrs;
    // Clear text input so that the original filter's input isn't copied in subsequent filters
    clone.getElementsByTagName("input")[0].value = "";
    // Insert cloned filter after previous filter
    $(clone).insertAfter("#fltrList" + (numFltrs - 1));

    // Note: A new filter's select doesn't have to be fixed because it is a clone of a filter whose select was already fixed.
}

// Code in this file is based on https://www.w3schools.com/howto/howto_js_form_steps.asp