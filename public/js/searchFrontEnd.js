// TODO: This file uses code from __Insert multi-step form tutorial URL here__

/* SETUP =============================================================================== */

// Makes loading prettier (elements are hidden until the html form in searchFrontEnd.php is loaded)
document.getElementById("nextBtn").style.display = "block";
document.getElementById("prevBtn").style.display = "block";
document.getElementById("steps").style.display = "block";

// x is an array containing every element in searchFrontEnd.php with the "tab" class.
const x = document.getElementsByClassName("tab");

// Current tab is set to be the first tab (0-based indexing)
let currTab = 0;

// Display the current tab
showTab();

/* FUNCTION DEFINITIONS ================================================================ */

/**
  * @brief Displays the specified tab of the form, fixing the Previous/Next buttons
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
    }
}

// TODO: function that clears all the cloned filters (not the original one)
function clearFilters();

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
  * @brief  Verifies that a tab is "valid" (user provides the required info)
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
        /*
        // For the last tab, check that either "All" is selected...
        if ($(":radio:checked").val() === "*") {
            valid = true;
        // ... or that at least one of the filters is selected.
        } else if ($("#columnsToShow:selected").length === 0) {
            valid = false;
            alert('Please select at least one column to display.');
        }
        */
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
// TODO: look up if you can call a function that takes a parameter with no parameters
function fixSelect(id) {
    if (currTab === 1) {
        // This block of code fixes the select element for a single filter
        // Reset the select (display all options)
        // TODO
        // Get the selected tables
        let tables = $(":checkbox:checked");
        // Hide(?) the options that do not belong to the selected tables
        function populateOrHideSelectOptionsFromSelectedTables();
        // Get the past selected filters
        let pastFilters = getPastFilters(id);
        // Remove(?) the options that were already selected in past filters
        populateOrHideSelectOptionsFromSelectedFilters();
    } else if (currTab === 2) {
        // Reset the select (display all options)
        // Get the selected tables (from step 1)
        let tables = $(":checkbox:checked");
        // Get the selected filters (from step 2)
        let pastFilters = getPastFilters(id);
        // Hide the options that do not belong to the selected tables
        populateOrHideSelectOptionsFromSelectedTables();
        // Make the options that were filtered in step 2 disabled
        disablePastFilters();

        /*
        Notes:
        - To get your SELECT part of your query take the filtered options in step 2 and the selected 
        options in step 3
        - To get your FROM, get the selected tables
        - To get your WHERE, get the selected filters and their values
        */

    }
}

/**
  * @brief  Returns the previously selected filters
  * @param   id   The ID of the select to fix
  */
  function getPastFilters(id) {
    // Extract filter number from id
    let fltrNum = 0; //TODO: extract filter number from id
    // TODO: instantiate fltrNum-sized array called pastFilters
    let i, pastFilters; // placeholder
    for (i = 0; i < filterNum; i++) {
        let fltrID = "fltr" + fltrNum;
        let filter = $("#" + fltrID + ":selected"); // TODO: does this work for not multiple?
        pastFilters[i] = filter;
    }
    return pastFilters;
}

//TODO: choose whether to populate or hide options
function populateOrHideSelectOptionsFromSelectedTables();

//TODO: choose whether to populate or hide options
// question: merge with getPastFilters? No, cause you're gonna use it to make your query
function populateOrHideSelectOptionsFromSelectedFilters();

//TODO
function disablePastFilters();


/**
  * @brief Logs the value of every selected checkbox in a form to the console.
  */
  function logSelectedCheckboxes() {
    $(":checkbox:checked").each(function () {
        console.log(this.value);
    });
}

/**
  * @brief  Adds a filter 
  */
  function addFilter() {
    // Declare static variable i to keep track of number of filters added
    // TODO: test this over refreshes and going back in the form
    // Might cause problems if filter deleting is implemented
    if (typeof addFilter.i === 'undefined') {
        addFilter.i = 0;
        addFilter.original = document.getElementById('fltrList');
    }
    // "deep" clone
    // TODO: test what happens when cloning a select that has had options hidden
    let clone = addFilter.original.cloneNode(true);
    // Give the clone a unique ID and increment i
    clone.id = "fltrList" + ++addFilter.i;
    // TODO: remove when done testing
    console.log(addFilter.i);
    console.log(clone.id);

    // TODO: give the select element inside the fltrList a unique ID
    // Probably something like this: (don't forget to increment addFilter here instead of 
    // up there if this is right)
    // clone.getElementsByTagName("select")[0].id = "fltr" + ++addFilter.i;
    // let fltrID = getElementsByTagName("select")[0].id;
    let fltrID = "fltr0"; // placeholder

    // Clear text input so that the original filter's input isn't copied in subsequent filters
    clone.getElementsByTagName("input")[0].value = "";
    // Remove "Add Filter" button
    let afb = document.getElementById('addFltrBtn');
    afb.parentNode.removeChild(afb);
    // Append cloned filter
    addFilter.original.parentNode.appendChild(clone);
    // Append "Add Filter" button
    clone.appendChild(afb);
    // Fix new filter's select element
    fixSelect(fltrID);
}