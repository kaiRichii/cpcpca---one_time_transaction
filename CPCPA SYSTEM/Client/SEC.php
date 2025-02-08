<?php 
    $backgroundImage = "./assets/img/logo-sec.jpg"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS File -->
    <link href="assets/css/pqrf.css" rel="stylesheet">
    <title>SEC Process</title>
</head>
<body>
    <div class="split-screen">
        <!-- dynamic left bg -->
        <div class="left" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('<?php echo $backgroundImage; ?>'); background-size: cover;">
        </div>
        <div class="right">
            <form>
                <section class="copy">
                    <h2>Select SEC Process</h2>
                </section>

                <!-- Custom Dropdown with checkboxes -->
                <div class="input-container name">
                    <label for="sec-process">Choose SEC Process</label>
                    <div class="custom-dropdown">
                        <button type="button" class="dropdown-btn">-- Select --</button>
                        <div class="checkbox-list" id="checkbox-list">
                            <label><input type="checkbox" value="registration" class="sec-checkbox"> SEC Registration</label>
                            <label><input type="checkbox" value="reporting" class="sec-checkbox"> SEC Reporting</label>
                            <label><input type="checkbox" value="amendment" class="sec-checkbox"> SEC Amendment</label>
                            <label><input type="checkbox" value="compliance" class="sec-checkbox"> SEC Compliance</label>
                            <label><input type="checkbox" value="closure" class="sec-checkbox"> SEC Closure</label>
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
                        <a href="#">Privacy and Policy</a> &amp; <a href="#">Terms and Conditions</a>.
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
        document.querySelectorAll(".sec-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                var selectedProcesses = [];
                document.querySelectorAll(".sec-checkbox:checked").forEach(function(checkedBox) {
                    selectedProcesses.push(checkedBox.value);
                });

                // Clear previous checkboxes in the checklist container
                var checklistContainer = document.getElementById("checklist-options");
                checklistContainer.innerHTML = "";

                // Define checklist items for each SEC Process
                var checklists = {
                    "registration": {
                        label: "SEC Registration",
                        items: [
                            "Certificate of Incorporation",
                            "Articles of Incorporation and By-laws",
                            "MC28 and eFAST Registration",
                            "Board Resolution and Secretary Certificate"
                        ]
                    },
                    "reporting": {
                        label: "SEC Reporting",
                        items: [
                            "Annual General Information Sheet (GIS)",
                            "Amendment of GIS",
                            "Annual Audited Financial Statements (AFS)",
                            "Other Annual Reports"
                        ]
                    },
                    "amendment": {
                        label: "SEC Amendment",
                        items: [
                            "Increase in Share Capital",
                            "Change in Office Address",
                            "Change in Shareholders",
                            "Other Amendments"
                        ]
                    },
                    "compliance": {
                        label: "SEC Compliance",
                        items: [
                            "Monitoring, Amnesty, and Penalty Payments"
                        ]
                    },
                    "closure": {
                        label: "SEC Closure",
                        items: [
                            "Dissolution and Certificate Cancellation"
                        ]
                    }
                };

                // Add checklist options for selected processes
                selectedProcesses.forEach(function(process) {
                    if (checklists[process]) {
                        // Add the label for the process
                        var sectionLabel = document.createElement("h4");
                        sectionLabel.textContent = checklists[process].label;
                        sectionLabel.style.marginTop = "0px"; 
                        sectionLabel.style.marginBottom = "10px"; 
                        checklistContainer.appendChild(sectionLabel);

                        // Add the checklist items
                        checklists[process].items.forEach(function(item, index) {
                            var label = document.createElement("label");
                            var checkbox = document.createElement("input");
                            checkbox.type = "checkbox";
                            checkbox.name = "sec-checklist[]"; 
                            checkbox.value = item;

                            label.style.display = "block";
                            label.style.margin = "2px 0";
                            label.style.fontSize = "14px";

                            label.appendChild(checkbox);
                            label.appendChild(document.createTextNode(item));
                            checklistContainer.appendChild(label);

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
