<?php 
    $backgroundImage = "./assets/img/BIR.png"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/pqrf.css" rel="stylesheet">
    <title>BIR Process</title>
</head>
<body>
    <div class="split-screen">
        <!-- dynamic left bg -->
        <div class="left" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('<?php echo $backgroundImage; ?>'); background-size: cover;">
        </div>
        <div class="right">
            <form>
                <section class="copy">
                    <h2>Select BIR Process</h2>
                </section>

                <!-- Custom Dropdown with checkboxes -->
                <div class="input-container name">
                    <label for="bir-process">Choose BIR Process</label>
                    <div class="custom-dropdown">
                        <button type="button" class="dropdown-btn">-- Select --</button>
                        <div class="checkbox-list" id="checkbox-list">
                            <label><input type="checkbox" value="registration" class="bir-checkbox"> BIR Registration</label>
                            <label><input type="checkbox" value="compliance" class="bir-checkbox"> BIR Compliance</label>
                            <label><input type="checkbox" value="amendment" class="bir-checkbox"> BIR Amendment</label>
                            <label><input type="checkbox" value="closure" class="bir-checkbox"> BIR Closure</label>
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
        document.querySelectorAll(".bir-checkbox").forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                var selectedProcesses = [];
                document.querySelectorAll(".bir-checkbox:checked").forEach(function(checkedBox) {
                    selectedProcesses.push(checkedBox.value);
                });

                var checklistContainer = document.getElementById("checklist-options");
                checklistContainer.innerHTML = "";

                var checklists = {
                    "registration": {
                        label: "BIR Registration",
                        items: [
                            "Complete Registration (COR, Books of Accounts, ATP, Printing of Invoices)",
                            "Processing of Authority to Print (ATP) only",
                            "Processing of Authority to Print (ATP) and Printing of BIR Service Invoice (10 booklets)",
                            " Processing of Authority to Print (ATP) and Printing of BIR Sales Invoice (10 booklets)",
                            "Processing of Authority to Print (ATP) for Supplementary Receipts e.g. Delivery Receipts, Billing Statement, Charge Invoices, Order Slips, Official Receipts, Collection Receipts",
                            "Processing of Books of Accounts only"
                        ]
                    },
                    "compliance": {
                        label: "BIR Compliance",
                        items: [
                            "Renewal of Books of Accounts",
                            "Certified True Copy of COR, FS or AFS, or Tax Returns or Tax Receipts",
                            "Updating of Documentary Stamp Taxes and Payment",
                            "Annual Income Tax Filing (1701, 1701A, 1702-RT) and Finansial Statement Preparation (non-audited)",
                            "Tax filing of monthly and quarterly tax returns (0619-E, 1601-EQ, 1601-C, 2550-Q, 2551-Q, 1701-Q, 1702-Q) only",
                            "Preparation of Financial Statements (non-audited) only",
                            "Preparation and filing of Lessee Information Sheet (LIS)",
                            "BIR Tax Assessment and Routing Slip for Open Cases Monitoring (Generation only)",
                            "Tax Mapping Assistance and Payment of Penalties",
                            "Filing Open Cases Filing and Payment of Penalties only (Without Certificate of No Liability)",
                            "Tax Clearance Filing for Ongoing Business (With Certificate of No Liability)",
                            "Registration and Enrollment to BIR EFPS for TAMP Taxpayers",
                            "Registration and Enrollment to BIR EACCREG for POS",
                            "Capital Gains Tax Processing (eCAR)",
                            "Estate Tax Processing (eCAR)"
                        ]
                    },
                    "amendment": {
                        label: "BIR Amendment",
                        items: [
                            "Update of COR Information ( Business Name, Registered Address & Application of Authority to Print with the new information)",
                            "Update of COR Additional Tax Types, Additional Line of Business, etc. (No need to apply for new ATP)"
                        ]
                    },
                    "closure": {
                        label: "BIR Closure",
                        items: [
                            "Business Registration Cancellation(Branch only), Tax Clearance & Certificate of No Liability",
                            "Business Registration Cancellation (Main), Tax Clearance & Certificate of No Liability"
                        ]
                    }
                };

                selectedProcesses.forEach(function(process) {
    if (checklists[process]) {
        var sectionLabel = document.createElement("h4");
        sectionLabel.textContent = checklists[process].label;
        sectionLabel.style.marginBottom = "4px"; // Add space below the section label
        checklistContainer.appendChild(sectionLabel);

        checklists[process].items.forEach(function(item, index) {
            var label = document.createElement("label");
            var checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "bir-checklist[]"; 
            checkbox.value = item;

            label.style.display = "block";
            label.style.marginBottom = "1px"; // Minimal spacing between items
            label.appendChild(checkbox);
            label.appendChild(document.createTextNode(" " + item));
            checklistContainer.appendChild(label);

            // Add extra spacing after the last item for separation
            if (index === checklists[process].items.length - 1) {
                label.style.marginBottom = "10px";
            }
        });
    }
});

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
