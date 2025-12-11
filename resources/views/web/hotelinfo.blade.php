<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

<style>
.form-box {
    width: 650px;
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

.form-box input, .form-box select {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 15px;
    border-radius: 10px;
    border: 1px solid #dcdcdc;
    font-size: 15px;
}

.row {
    display: flex;
    gap: 15px;
}

.row > div {
    flex: 1;
}

/* People dropdown */
.people-box {
    position: relative;
}

.dropdown {
    position: absolute;
    top: 55px;
    right: 0;
    background: #fff;
    padding: 20px;
    width: 230px;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    display: none;
}

.counter-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.counter-row button {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: none;
    background: #f2f2f2;
    font-size: 18px;
    cursor: pointer;
}

.next-btn {
    width: 120px;
    padding: 12px;
    border: none;
    border-radius: 30px;
    background: #e5f0ff;
    color: #6c98ff;
    cursor: pointer;
    font-size: 16px;
}
</style>

<div class="form-box">
    <form action="{{ route('hotel.store') }}" method="POST">
    @csrf

        <!-- Hotel Name -->
        <input type="text" name="name" placeholder="Hotel Name, City" required>

        <!-- Board Name -->
        <select name="board_name" required>
            <option value="">Select board name</option>
            <option value="Half Board">Half Board</option>
            <option value="Full Board">Full Board</option>
            <option value="Breakfast Only">Breakfast Only</option>
        </select>

        <div class="row">
            <!-- Check-in -->
            <div>
                <input type="text" id="check_in" name="check_in" placeholder="Check in" required>
            </div>

            <!-- Check-out -->
            <div>
                <input type="text" id="check_out" name="check_out" placeholder="Check out" required>
            </div>

            <!-- People -->
            <div class="people-box">
                <input type="text" id="people" name="people_number" value="1 adult" readonly>
                
                <div class="dropdown" id="peopleDropdown">
                    <div class="counter-row">
                        <span>Adults</span>
                        <div>
                            <button type="button" onclick="changeCount('adult', -1)">-</button>
                            <span id="adultCount">1</span>
                            <button type="button" onclick="changeCount('adult', 1)">+</button>
                        </div>
                    </div>

                    <div class="counter-row">
                        <span>Children</span>
                        <div>
                            <button type="button" onclick="changeCount('child', -1)">-</button>
                            <span id="childCount">0</span>
                            <button type="button" onclick="changeCount('child', 1)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="next-btn">Next →</button>
    </form>
</div>

<script>
// Date Picker
flatpickr("#check_in", { dateFormat: "Y-m-d" });
flatpickr("#check_out", { dateFormat: "Y-m-d" });

// People Dropdown
const peopleInput = document.getElementById("people");
const dropdown = document.getElementById("peopleDropdown");

peopleInput.addEventListener("click", () => {
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
});

// Counter Logic
function changeCount(type, amount) {
    let adult = parseInt(document.getElementById("adultCount").innerText);
    let child = parseInt(document.getElementById("childCount").innerText);

    if (type === "adult") {
        adult = Math.max(1, adult + amount);
        document.getElementById("adultCount").innerText = adult;
    } else {
        child = Math.max(0, child + amount);
        document.getElementById("childCount").innerText = child;
    }

    // Update input value
    let txt = `${adult} adult`;
    if (child > 0) txt += `, ${child} child`;

    peopleInput.value = txt;
}
</script>
