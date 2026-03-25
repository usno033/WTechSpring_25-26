function analyzeText() {
    let text = document.getElementById("textInput").value;

    if (text.trim() === "") {
        document.getElementById("charCount").innerText = 0;
        document.getElementById("wordCount").innerText = 0;
        document.getElementById("reverseOutput").innerText = "No text provided.";
        return;
    }

    let charCount = text.length;

    let words = text.trim().split(/\s+/);
    let wordCount = words.length;

    let reversedText = text.split("").reverse().join("");

    document.getElementById("charCount").innerText = charCount;
    document.getElementById("wordCount").innerText = wordCount;
    document.getElementById("reversedOutput").innerText = reversedText;
}