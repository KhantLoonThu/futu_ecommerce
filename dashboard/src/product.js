const doc = document;
const nextBtn = doc.getElementsByClassName("next-btn")[0];
const backToFirstPageBtn = doc.getElementsByClassName(
  "back-to-first-page"
)[0];
const createProductFirstpage = doc.getElementsByClassName(
  "create-product-firstpage"
)[0];
const createProductSecondpage = doc.getElementsByClassName(
  "create-product-secondpage"
)[0];
const createProductCategorySelect = doc.getElementsByClassName(
  "create-product-category-name"
)[0];
const createProductSubcategorySelect = doc.getElementsByClassName(
  "create-product-subcategory-name"
)[0];
console.log(createProductCategorySelect);
console.log(createProductSubcategorySelect);
// end create

const action_nextBtn = (
  nextBtn,
  firstpage,
  secondpage,
  category,
  subcategory
) => {
  nextBtn.addEventListener("click", (event) => {
    event.preventDefault();
    if (Number(category.value) > 0 && Number(subcategory.value) > 0) {
      firstpage.classList.toggle("hidden");
      secondpage.classList.toggle("hidden");
    } else {
      alert("Fill the inputs first");
    }
  });
};

const back_to_first_page = (
  backToFistPageBtn,
  firstpage,
  secondpage
) => {
  backToFistPageBtn.addEventListener("click", (event) => {
    event.preventDefault();
    secondpage.classList.toggle("hidden");
    firstpage.classList.toggle("hidden");
  });
};

const get_selected_subcategories = (
  category,
  subcategorySelect
) => {
  category.addEventListener("change", () => {
    subcategorySelect.innerHTML = "";
    const currentCategory = category.value;

    $.ajax({
      method: "post",
      url: "../api/product.php",
      data: { category: currentCategory },
      success: function (response) {
        let data = JSON.parse(response);
        console.log(data);

        if (!(category.value.length > 0) || category.value === "0") {
          subcategorySelect.parentElement?.classList.add("hidden");
        } else {
          subcategorySelect.parentElement?.classList.remove("hidden");
        }

        if (data.length > 0) {
          data.forEach((subcategory) => {
            let option = document.createElement("option");
            option.innerText = subcategory.name;
            option.value = subcategory.id.toString();
            subcategorySelect.append(option);
          });
        } else {
          let option = document.createElement("option");
          option.innerText = "This category has no subcategory yet!";
          option.value = "0";
          subcategorySelect.append(option);
        }
      },
    });
  });
};
// Product Page
// create
action_nextBtn(
  nextBtn,
  createProductFirstpage,
  createProductSecondpage,
  createProductCategorySelect,
  createProductSubcategorySelect
);
back_to_first_page(
  backToFirstPageBtn,
  createProductFirstpage,
  createProductSecondpage
);
get_selected_subcategories(
  createProductCategorySelect,
  createProductSubcategorySelect
); 7