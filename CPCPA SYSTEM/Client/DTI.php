<?php 
    $backgroundImage = "./assets/img/DTI New.png"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/pqrf.css" rel="stylesheet">
    <title>DTI</title>
</head>
<body>
    <div class="split-screen">
        <!-- dynamic left bg -->
        <div class="left" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('<?php echo $backgroundImage; ?>'); background-size: cover;">
        </div>
        <div class="right">
            <form>
                <section class="copy">
                    <h2>Select DTI Process</h2>
                </section>

                <!-- Custom Dropdown with checkboxes -->
                <div class="input-container name">
                    <label for="dti-process">Choose DTI Process</label>
                    <div class="custom-dropdown">
                        <button type="button" class="dropdown-btn">-- Select --</button>
                        <div class="checkbox-list" id="checkbox-list">
                            <label><input type="checkbox" value="registration" class="dti-checkbox"> DTI Registration</label>
                            <label><input type="checkbox" value="amendment" class="dti-checkbox"> DTI Amendment</label>
                            <label><input type="checkbox" value="closure" class="dti-checkbox"> DTI Closure</label>
                            <label><input type="checkbox" value="other" class="dti-checkbox"> Other DTI Compliance</label>
                        </div>
                    </div>
                </div>

                <!-- Checkboxes for selected processes -->
                <div class="input-container name hidden" id="checklist-container">
<br>
                    <div id="checklist-options">
                        <!-- Options will be dynamically added -->
                    </div>
                </div>

                <button class="signup-btn" type="submit">Submit</button>

                <section class="copy legal">
                    <p><span class="small">By continuing, you agree to accept our 
                        <br>
                        <a href="#">Privacy and Policy</a> &amp; <a href="#">Terms and Conditions</a> .
                    </span></p>
                </section>
            </form>
        </div>
    </div>

    <script>
        const dropdownButton = document.querySelector(".dropdown-btn");
        const checkboxList = document.getElementById("checkbox-list");

        dropdownButton.addEventListener("click", function (event) {
            event.stopPropagation(); // Prevent click from propagating to the document
            checkboxList.classList.toggle("show");
        });

        document.addEventListener("click", function (event) {
            if (!checkboxList.contains(event.target) && !dropdownButton.contains(event.target)) {
                checkboxList.classList.remove("show");
            }
        });

        // Handle the selected checkboxes and show checklist options
        document.querySelectorAll(".dti-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                var selectedProcesses = [];
                document.querySelectorAll(".dti-checkbox:checked").forEach(function(checkedBox) {
                    selectedProcesses.push(checkedBox.value);
                });

                // Clear previous checkboxes in the checklist container
                var checklistContainer = document.getElementById("checklist-options");
                checklistContainer.innerHTML = "";

                // Define checklist items for each DTI Process
                var checklists = {
                    "registration": {
                        label: "DTI Registration",
                        items: [
                            "DTI Certificate",
                            "DTI Trade Fair Permit",
                            "BMBE",
                            "Renewal of Expired DTI Certificate"
                        ]
                    },
                    "amendment": {
                        label: "DTI Amendment",
                        items: [
                            "Change Business Name",
                            "Change Business Address",
                            "Update information (e.g., email address, contact information)"
                        ]
                    },
                    "closure": {
                        label: "DTI Closure",
                        items: [
                            "Cancellation of Business Name"
                        ]
                    },
                    "other": {
                        label: "Other DTI Compliance",
                        items: [
                            "Custom Compliance Document",
                            "Special Business Permit"
                        ]
                    }
                };

                // Add checklist options for selected processes
            selectedProcesses.forEach(function(process) {
                if (checklists[process]) {
                    // Add the label for the process
                    var sectionLabel = document.createElement("h4");
                    sectionLabel.textContent = checklists[process].label;

                    // Apply less spacing at the top of the label
                    sectionLabel.style.marginTop = "0px"; 
                    sectionLabel.style.marginBottom = "10px"; 
                    checklistContainer.appendChild(sectionLabel);

                    // Add the checklist items
                    checklists[process].items.forEach(function(item, index) {
                        var label = document.createElement("label");
                        var checkbox = document.createElement("input");
                        checkbox.type = "checkbox";
                        checkbox.name = "dti-checklist[]"; 
                        checkbox.value = item;

                        // Apply minimal spacing between items
                        label.style.display = "block";
                        label.style.margin = "2px 0";
                        label.style.fontSize = "14px";

                        label.appendChild(checkbox);
                        label.appendChild(document.createTextNode(item));
                        checklistContainer.appendChild(label);

                        // Add extra spacing after the last item
                        if (index === checklists[process].items.length - 1) {
                            label.style.marginBottom = "10px";
                        }
                    });
                }
            });


                // Show the checklist container if there are selected processes
                var checklistContainer = document.getElementById("checklist-container");
                if (selectedProcesses.length > 0) {
                    checklistContainer.classList.remove("hidden");
                } else {
                    checklistContainer.classList.add("hidden");
                }
            });
        });
    </script>
</body>
</html>
