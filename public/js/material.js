"use strict";

//モダール操作関連の変数
const materialModalTrigger = document.getElementById("materialModalTrigger");
const materialModal = document.getElementById("materialModal");
const material = document.getElementsByClassName("jsMaterial"); //各教材
const modalClose = document.getElementById("modalClose");

//教材選択関連の変数
const materialNameForm = document.getElementById("material"); //教材名のinputを取得
const materialId = document.getElementById("material_id"); //教材id
const materialImg = document.getElementById("materialImg"); //教材画像

//モダール操作関連関数
function activateModal() {
    materialModal.classList.add("is-modal-active");
}
function removeModal() {
    materialModal.classList.remove("is-modal-active");
}

//教材選択関連関数
//教材idを取得
function getMaterialId(selectedMaterial) {
    // let selectedMaterial = material[i].getAttribute("id");
    selectedMaterial = selectedMaterial.split("_");
    let selectedMaterialId = selectedMaterial[1];
    return selectedMaterialId;
}
//教材名を取得
function getMaterialName(selectedMaterialId) {
    let selectedMaterialName = document.getElementById(
            `materialName_${selectedMaterialId}`
        ).textContent;
    return selectedMaterialName;
}
//教材画像のパスを取得
function getMaterialImagePath(selectedMaterialId) {
        let selectedMaterialImagePath = document.getElementById(
            `materialImg_${selectedMaterialId}`
        ).getAttribute("src");
    return selectedMaterialImagePath;
}
function setMaterialInfo(selectedMaterialId, selectedMaterialName, selectedMaterialImagePath) {
        //教材名をinputに渡す
        materialNameForm.setAttribute("value", selectedMaterialName);
        //教材idをinputに渡す
        materialId.setAttribute("value", selectedMaterialId);
        //画像を渡す
        materialImg.setAttribute("src", selectedMaterialImagePath);
}

//モダールのイベント
materialModalTrigger.addEventListener(
    "click",
    function() {
        activateModal();
    },
    false
);
modalClose.addEventListener(
    "click",
    function() {
        removeModal();
    },
    false
);

//教材が選択された時の処理
for (let i = 0; i < material.length; i++) {
    material[i].onclick = function() {
        removeModal();
        //教材idを取得
        let selectedMaterial = this.getAttribute("id");
        let selectedMaterialId = getMaterialId(selectedMaterial);

        //取得した教材idから教材名を取得
        let selectedMaterialName = getMaterialName(selectedMaterialId);

        //取得した教材idから画像パスを取得
        let selectedMaterialImagePath = getMaterialImagePath(selectedMaterialId);

        //セッティング
        setMaterialInfo(selectedMaterialId, selectedMaterialName, selectedMaterialImagePath);
    };
}
