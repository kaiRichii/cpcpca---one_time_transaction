<?php
    $backgroundImage = "./assets/img/sss.png"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/pqrf.css" rel="stylesheet">
    <title>SPP</title>
</head>
<body>
    <div class="split-screen">
        <div class="left" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('<?php echo $backgroundImage; ?>'); background-size: cover;">
            <!-- <section class="copy">
                <h1>
                    Explore your BIR process with CPCPA
                </h1>
                <p>2F Annex 1 Bldg., South Central Square, National Hi-way, Lawaan 3 6045 Talisay, Philippines</p>
            </section> -->
        </div>
        <div class="right">
            <form>
                <section class="copy">
                    <h2>Select SPP Process</h2>
                     
                </section>
                <!-- Custom Dropdown with checkboxes -->
                <div class="input-container name">
                    <label for="spp-process">Choose SPP Process</label>
                    <div class="custom-dropdown">
                        <button type="button" class="dropdown-btn">-- Select --</button>
                        <div class="checkbox-list" id="checkbox-list">
                            <label><input type="checkbox" value="sss" class="spp-checkbox"> SSS Registration</label>
                            <label><input type="checkbox" value="phic" class="spp-checkbox"> PHIC Registration</label>
                            <label><input type="checkbox" value="hdmf" class="spp-checkbox"> HDMF Registration</label>
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
            event.stopPropagation(); 
            checkboxList.classList.toggle("show");
        });

        document.addEventListener("click", function (event) {
            if (!checkboxList.contains(event.target) && !dropdownButton.contains(event.target)) {
                checkboxList.classList.remove("show");
            }
        });

        // Handle checkbox selections and display checklists
        document.querySelectorAll(".spp-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                var selectedProcesses = [];
                document.querySelectorAll(".spp-checkbox:checked").forEach(function(checkedBox) {
                    selectedProcesses.push(checkedBox.value);
                });

                // Clear previous checklist options
                var checklistContainer = document.getElementById("checklist-options");
                checklistContainer.innerHTML = "";

                // Define checklist items for each spp Process
                var checklists = {
                    "sss": {
                        label: "SSS Registration",
                        items: [
                            "Company Registration in SSS (Certificate of Registration and Online Enrollment",
                            "Employee Registration"
                        ]
                    },
                    "phic": {
                        label: "PHIC Registration",
                        items: [
                            "Company Registration in Philhealth (Certificate of Registration and Online Enrollment",
                            "Employee Registration",
                        ]
                    },
                    "hdmf": {
                        label: "HDMF Registration",
                        items: [
                            " Company Registration in Pag-ibig (Certificate of Registration and Online Enrollment)",
                            " Employee Registration"
                        ]
                    },
                };

                // Add checklist options for selected processes
                selectedProcesses.forEach(function(process) {
                    if (checklists[process]) {
                        // Add section label
                        var sectionLabel = document.createElement("h4");
                        sectionLabel.textContent = checklists[process].label;

                        sectionLabel.style.marginTop = "0px"; 
                        sectionLabel.style.marginBottom = "10px";
                        checklistContainer.appendChild(sectionLabel);

                        // Add checklist items
                        checklists[process].items.forEach(function(item, index) {
                            var label = document.createElement("label");
                            var checkbox = document.createElement("input");
                            checkbox.type = "checkbox";
                            checkbox.name = "spp-checklist[]"; // Use an array for multiple selections
                            checkbox.value = item;

                            label.style.display = "block";
                            label.style.margin = "2px 0";
                            label.style.fontSize = "14px";

                            label.appendChild(checkbox);
                            label.appendChild(document.createTextNode(" " + item));
                            checklistContainer.appendChild(label);

                            // Add spacing after the last item only
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