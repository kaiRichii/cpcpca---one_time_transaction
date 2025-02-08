<?php 
    $backgroundImage = "./assets/img/cpcpa-logo.jpg"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/pqrf.css" rel="stylesheet">
    <title>CPA Consultation</title>
</head>
<body>
    <div class="split-screen">
        <!-- Dynamic left background -->
        <div class="left" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('<?php echo $backgroundImage; ?>'); background-size: cover;">
        </div>
        <div class="right">
            <form>
                <section class="copy">
                    <h2>Select CPA Consultation</h2>
                </section>

                <!-- Custom Dropdown with checkboxes -->
                <div class="input-container name">
                    <label for="cpa-services">Choose CPA Service</label>
                    <div class="custom-dropdown">
                        <button type="button" class="dropdown-btn">-- Select --</button>
                        <div class="checkbox-list" id="checkbox-list">
                            <label><input type="checkbox" value="consultation_coaching" class="cpa-checkbox"> Consultation - Online / Virtual Coaching</label>
                            <label><input type="checkbox" value="consultation_meetings" class="cpa-checkbox"> Consultation - Face-to-Face & Contracts</label>
                            <label><input type="checkbox" value="internal_audit" class="cpa-checkbox"> Internal Audit</label>
                            <label><input type="checkbox" value="agreed_procedures" class="cpa-checkbox"> Agreed Upon Procedures</label>
                        </div>
                    </div>
                </div>

                <!-- Checkboxes for selected services -->
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
        document.querySelectorAll(".cpa-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                var selectedServices = [];
                document.querySelectorAll(".cpa-checkbox:checked").forEach(function(checkedBox) {
                    selectedServices.push(checkedBox.value);
                });

                // Clear previous checkboxes in the checklist container
                var checklistContainer = document.getElementById("checklist-options");
                checklistContainer.innerHTML = "";

                // Define checklist items for each CPA Service
                var checklists = {
                    "consultation_coaching": {
                        label: "Consultation - Online / Virtual Coaching",
                        items: [
                            "Tax Preparation, Filing of Tax Returns, and Other BIR Compliance",
                            "Taxation and Tax Planning",
                            "Business Licensing or Closure",
                            "Accounting and Bookkeeping",
                            "Financial Reporting",
                            "Management Reporting",
                            "Payroll and Labor Regulations",
                            "Process Advisory"
                        ]
                    },
                    "consultation_meetings": {
                        label: "Consultation - Face-to-Face & Contracts",
                        items: [
                            "Drafting of Contracts (e.g. Rental Contract, Franchise Agreements, etc.)",
                            "Face-to-Face Staff Training",
                            "Face-to-Face Meeting (local and nearby major cities)",
                            "Face-to-Face Meeting (out of town)"
                        ]
                    },
                    "internal_audit": {
                        label: "Internal Audit Services",
                        items: [
                            "Onsite Procedures",
                            "Online Procedures"
                        ]
                    },
                    "agreed_procedures": {
                        label: "Agreed Upon Procedures",
                        items: [
                            "Per Account Title"
                        ]
                    }
                };

                // Add checklist options for selected services
                selectedServices.forEach(function(service) {
                    if (checklists[service]) {
                        // Add the label for the service
                        var sectionLabel = document.createElement("h4");
                        sectionLabel.textContent = checklists[service].label;

                        sectionLabel.style.marginTop = "0px"; 
                        sectionLabel.style.marginBottom = "10px"; 
                        checklistContainer.appendChild(sectionLabel);

                        // Add the checklist items
                        checklists[service].items.forEach(function(item, index) {
                            var label = document.createElement("label");
                            var checkbox = document.createElement("input");
                            checkbox.type = "checkbox";
                            checkbox.name = "cpa-checklist[]"; 
                            checkbox.value = item;

                            // Apply minimal spacing between items
                            label.style.display = "block";
                            label.style.margin = "2px 0";
                            label.style.fontSize = "14px";

                            label.appendChild(checkbox);
                            label.appendChild(document.createTextNode(item));
                            checklistContainer.appendChild(label);

                            // Add extra spacing after the last item
                            if (index === checklists[service].items.length - 1) {
                                label.style.marginBottom = "10px";
                            }
                        });
                    }
                });

                // Show the checklist container if there are selected services
                var checklistContainer = document.getElementById("checklist-container");
                if (selectedServices.length > 0) {
                    checklistContainer.classList.remove("hidden");
                } else {
                    checklistContainer.classList.add("hidden");
                }
            });
        });
    </script>
</body>
</html>
