// Makes loading prettier
document.getElementById("nextBtn").style.display = "block";
document.getElementById("prevBtn").style.display = "block";
document.getElementById("steps").style.display = "block";

const x = document.getElementsByClassName("tab");

let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n === 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n === (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n);
    // ... and run a function that adjusts options available in select elements based on previous inputs:
    fixSelectOptions();
}

function nextPrev(n) {
    // This function will figure out which tab to display
    // Exit the function if any field in the current tab is invalid:
    if (n === 1 && !validateForm()) return false;
    // If you have reached the end of the form... :
    if (currentTab + n >= x.length) {
        //...the form gets submitted:
        document.getElementById("search").submit();
        return false;
    }
    // Otherwise, hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab += n;
    // Display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    let y, valid = true;
    if (currentTab === 0) {
        if ($(":checkbox:checked").length < 1) {
            alert('Please select a table to search over.');
            valid = false;
        }
    } else if (currentTab === 2) {
        // Check that either "All" is selected or at least one of the filters is selected
        if ($(":radio:checked").val() === "*") {
            valid = true;
        } else if ($("#columnsToShow:selected").length === 0) {
            alert('Please select at least one column to display.');
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    let i, s = document.getElementsByClassName("step");
    for (i = 0; i < s.length; i++) {
        s[i].className = s[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    s[n].className += " active";
}

// should I pass in the select's ID? For addFilter?
function fixSelectOptions() {
    if (currentTab === 1) {
        // Reset the select (display all options)
        // Get the selected tables
        let tables = $(":checkbox:checked");
        // Hide the options that do not belong to the selected tables
    } else if (currentTab === 2) {
        // Reset the select (display all options)
        // Get the selected tables
        // Get the selected filters
        // Hide the options that do not belong to the selected tables
        // Make the options that were filtered in step 2 disabled (to get your SELECT take the filtered options in
        //  step 2 and the selected options in step 3)
    }
}

function logSelectedCheckboxes() {
    $(":checkbox:checked").each(function () {
        console.log(this.value);
    });
}

function addFilter() {
    if (typeof addFilter.i === 'undefined') {
        addFilter.i = 0;
        addFilter.original = document.getElementById('filterlist');
    }
    let clone = addFilter.original.cloneNode(true); // "deep" clone
    clone.id = "filterlist" + ++addFilter.i; // ID must be unique
    // Clear text input so that input isn't copied when adding a filter
    clone.getElementsByTagName("input")[0].value = "";
    // Remove "Add Filter" button
    let afb = document.getElementById('addfltrbutton');
    afb.parentNode.removeChild(afb);
    // Append cloned filter
    addFilter.original.parentNode.appendChild(clone);
    // Append "Add Filter" button
    clone.appendChild(afb);
}