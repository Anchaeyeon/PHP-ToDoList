document.addEventListener("DOMContentLoaded", function () {
    const errorText = document.getElementById("error");
    const addButton = document.querySelector("#add-btn input");
    const inputField = document.querySelector("#wrapper input");

    errorText.style.display = "none"; // 초기 오류 메시지 숨김

    addButton.addEventListener("click", function (event) {
        event.preventDefault(); // 폼 제출 방지 (페이지 새로고침 방지)

        const taskText = inputField.value.trim();

        if (!taskText) {
            errorText.style.display = "block";
            return;
        }

        errorText.style.display = "none";

        inputField.value = ""; // 입력 필드 초기화
    });
});
