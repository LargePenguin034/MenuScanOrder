function addtype() {
    var x = document.getElementById("type");
    var option = document.createElement("option");
    var type = document.getElementById("typeaddition").value; 
    option.text = type;
    option.id = type;
    option.selected = true;
    if (option.text != "") {
        x.add(option);
    }
    document.getElementById("typeaddition").value = "";

}

function edit(item) {
    document.getElementById("item_id").value = item["item_id"]
    document.getElementById("item_name").value = item["item_name"]
    document.getElementById("description").value = item["description"]
    document.getElementById("type").value = item["type"]
    document.getElementById("kj").value = item["kj"]
    document.getElementById("price").value = item["price"]
    document.getElementById("MenuLabel").innerHTML = "Edit Menu Item"
    document.getElementById("addeditButton").innerHTML = "Edit Item"
    document.getElementById("deleteButton").disabled = false
}

function add() {
    document.getElementById("item_id").value = ""
    document.getElementById("item_name").value = ""
    document.getElementById("description").value = ""
    document.getElementById("type").value = ""
    document.getElementById("kj").value = ""
    document.getElementById("price").value = ""
    document.getElementById("MenuLabel").innerHTML = "Add Menu Item"
    document.getElementById("addeditButton").innerHTML = "Add Item"
    document.getElementById("deleteButton").disabled = true

}