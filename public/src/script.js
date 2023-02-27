// SELECT THE LIST BENEFITS TABLE
const listBenefits = document.querySelector("#list-benefits");

// ADD EVENT LISTENER ON CREATE LIST BUTTON
document.getElementById("create-list")?.addEventListener("click", addNewRow);

// INITIALIZE ID COUNTER TO 8
let id = 1;

// CREATE ADD NEW ROW FUNCTION
function addNewRow() {
  // CREATE HTML TEMPLATE FOR NEW ROW
  const rowDetails = `<td>
                        <div class="flex items-center justify-center">
                          <button class="mr-2 text-red btn-r" id="btn-r${id}"><i class="fa-solid fa-circle-xmark"></i></button>
                          <input name="benefit[${id}]" maxlength="50" type="text" class="text-black xl:text-sm sm:text-xs text-[14px] leading-6 tracking-normal border-[1px] border-dark-grey bg-azure md:px-2 px-1 xl:w-[440px] lg:w-[300px] md:w-[200px] w-[100px] h-[46px] text-center flex items-center justify-center focus:outline-none">
                        </div>
                      </td>
                      <td>
                        <label class="flex items-center justify-center">
                          <input type="radio" name="type[${id}]" value="emotional" />
                          <span></span>
                        </label>
                      </td>
                      <td>
                        <label class="flex items-center justify-center">
                          <input type="radio" name="type[${id}]" value="economic" />
                          <span></span>
                        </label>
                      </td>
                      <td>
                        <label class="flex items-center justify-center">
                          <input type="radio" name="type[${id}]" value="functional" />
                          <span></span>
                        </label>
                      </td>`;

  // CREATE NEW ROW ELEMENT
  const newRow = document.createElement("tr");
  newRow.id = `row-${id}`;
  newRow.innerHTML = rowDetails;

  // INSERT NEW ROW ELEMENT BEFORE THE LAST ROW IN THE TABLE
  listBenefits
    .querySelector("tbody")
    .insertBefore(
      newRow,
      listBenefits.querySelector("tbody").lastElementChild.nextSibling
    );

  // ADD EVENT LISTENER TO NEW ROW'S DELETE BUTTON
  const newButton = newRow.querySelector(".btn-r");
  newButton?.addEventListener("click", function () {
    const row = this.closest("tr");
    row.remove();
  });

  // INCREMENT ID COUNTER FOR NEXT ROW
  id++;
}

// ADD EVENT LISTENER TO THE TABLE TO LISTEN FOR CLICK EVENTS ON ROWS' DELETE BUTTONS
listBenefits?.addEventListener("click", function (event) {
  if (event.target.classList.contains("btn-r")) {
    const row = event.target.closest("tr");
    row.remove();
  }
});

// ADD EVENT LISTENERS TO THE EXISTING DELETE BUTTONS
for (let i = 1; i <= 1; i++) {
  const button = document.getElementById(`btn-r${i}`);
  button?.addEventListener("click", function () {
    const row = this.closest("tr");
    row.remove();
  });
}

// DOWNLOAD MODAL
const downloadModal = document.querySelector(".download-modal");
const showDownloadModal = document.querySelectorAll(".show-download-modal");
const closeDownloadModal = document.querySelector(".close-download-modal");

showDownloadModal.forEach((show) => {
    show?.addEventListener("click", function () {
        downloadModal.classList.remove("hidden");
    });
});

closeDownloadModal?.addEventListener("click", function () {
    downloadModal.classList.add("hidden");
});

// THANKYOU MODAL
const thankyouModal = document.querySelector(".thankyou-modal");
const showThankyouModal = document.querySelector(".show-thankyou-modal");
const closeThankyouModal = document.querySelectorAll(".close-thankyou-modal");

showThankyouModal?.addEventListener("click", function () {
    thankyouModal.classList.remove("hidden");
    downloadModal.classList.add("hidden");
});

closeThankyouModal.forEach((close) => {
    close?.addEventListener("click", function () {
        thankyouModal.classList.add("hidden");
        downloadModal.classList.add("hidden");
        // window.reload();
    });
    // window.reload();
});
