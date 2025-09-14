function showModal(state, title, content) {
  let modalTitle = document.querySelector("#modal-title");
  let modalContent = document.querySelector("#modal-content");
  let modalColor = "w3-";
  let modalIcon = "";

  switch (state) {
    case "success":
      modalColor += "green";
      modalIcon = "checkmark-circle";
      break;
    case "info":
      modalColor += "indigo";
      modalIcon = "information-circle";
      break;
    case "error":
      modalColor += "red";
      modalIcon = "alert-circle";
      break;
    case "warning":
      modalColor += "warning";
      modalIcon = "warning";
      break;
  }
  let modalHeader = modalTitle.parentElement;
  modalHeader.classList.add(modalColor);

  let iconType = modalTitle.children[0].setAttribute("name", modalIcon);

  titleNode = document.createElement("span");
  titleNode.innerHTML = title;
  modalTitle.appendChild(titleNode);

  modalContent.innerHTML = content;
  document.querySelector("#modal").style.display = "block";
}

function hideModal() {
  document.querySelector("#modal").style.display = "none";
}
