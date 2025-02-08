<?php
    $backgroundImage = "./assets/img/lgu.png"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/pqrf.css">
    <title>LGU</title>
</head>
<body>
    <div class="split-screen">
        <div class="left" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('<?php echo $backgroundImage; ?>'); background-size: cover;"        >
            <!-- <section class="copy">
                <h1>
                    Explore your CPA process with CPCPA
                </h1>
                <p>2F Annex 1 Bldg., South Central Square, National Hi-way, Lawaan 3 6045 Talisay, Philippines</p>
            </section> -->
        </div>
        <div class="right">
            <form>
                <section class="copy">
                    <h2>Select LGU Process</h2>
                     
                </section>
                 <!-- Custom Dropdown with checkboxes -->
                <div class="input-container name">
                    <label for="lgu-process">Choose LGU Process</label>
                    <div class="custom-dropdown">
                        <button type="button" class="dropdown-btn">-- Select --</button>
                        <div class="checkbox-list" id="checkbox-list">
                            <label><input type="checkbox" value="registration" class="lgu-checkbox"> LGU Registration</label>
                            <label><input type="checkbox" value="compliance" class="lgu-checkbox"> LGU Compliance</label>
                            <label><input type="checkbox" value="amendment" class="lgu-checkbox"> LGU Amendment</label>
                            <label><input type="checkbox" value="closure" class="lgu-checkbox"> LGU Closure</label>
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
                        <a href="#">Privacy and Policy</a>
                        &amp;
                        <a href="#">Terms and Conditions</a>.
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

        // Handle checkbox selections and display checklists
        document.querySelectorAll(".lgu-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                var selectedProcesses = [];
                document.querySelectorAll(".lgu-checkbox:checked").forEach(function(checkedBox) {
                    selectedProcesses.push(checkedBox.value);
                });

                // Clear previous checklist options
                var checklistContainer = document.getElementById("checklist-options");
                checklistContainer.innerHTML = "";

                // Define checklist items for each LGU Process
                var checklists = {
                    "registration": {
                        label: "LGU Registration",
                        items: [
                            "Barangay Business Certificate",
                            "Other Permits to Operate (Fire Certificate, Sanitary Certificate or Environmental or CENRO Certificate)",
                            "Mayor's Permit (Complete)"
                        ]
                    },
                    "compliance": {
                        label: "LGU Compliance",
                        items: [
                            "Renewal of Mayor's Permit (Complete)",
                            "Renewal of Other Permits to Operate (Fire Certificate, Sanitary Certificate or Environmental or CENRO Certificate)",
                            "Updating of Local Tax Assessment and Payment",
                            "Updating of Real Property Tax Assessment and Payment",
                            "Processing of Certified True Copy of Permits or Receipts"
                        ]
                    },
                    "amendment": {
                        label: "LGU Amendment",
                        items: [
                            "Update of Information e.g. Owner's Name, Business Name, Registered Address"
                        ]
                    },
                    "closure": {
                        label: "LGU Closure",
                        items: [
                            "Retirement of Business and Cancellation of Mayor's Permit (Updated Payment)",
                            "Retirement of Business and Cancellation of Mayor's Permit with Unpaid Local Tax Assessments"
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
                        checkbox.name = "lgu-checklist[]"; 
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