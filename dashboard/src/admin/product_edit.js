// edit
const doc = document;
const nextBtnEdit = doc.getElementsByClassName(
    "next-btn-edit"
)[0];
const backToFirstPageBtnEdit = doc.getElementsByClassName(
    "back-to-first-page-edit"
)[0];
console.log(backToFirstPageBtnEdit);
const editProductFirstpage = doc.getElementsByClassName(
    "edit-product-firstpage"
)[0];
const editProductSecondpage = doc.getElementsByClassName(
    "edit-product-secondpage"
)[0];
const editProductCategorySelect = doc.getElementsByClassName(
    "edit-product-category-name"
)[0];
const editProductSubcategorySelect = doc.getElementsByClassName(
    "edit-product-subcategory-name"
)[0];
// end edit

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

action_nextBtn(
    nextBtnEdit,
    editProductFirstpage,
    editProductSecondpage,
    editProductCategorySelect,
    editProductSubcategorySelect
);
back_to_first_page(
    backToFirstPageBtnEdit,
    editProductFirstpage,
    editProductSecondpage
);
