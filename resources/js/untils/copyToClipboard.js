class CopyToClipboard {
    constructor(text) {
        this.text = text;
        this.copyText();
    }
    
    copyText() {
        navigator.clipboard.writeText(this.text)
        // var TempText = document.createElement("input");
        // TempText.value = this.text;
        // document.body.appendChild(TempText);
        // TempText.select();


        // // Select the text field
        // // this.element.select();
        // // this.element.setSelectionRange(0, 99999); // For mobile devices
        // console.log(this.text);
        // // Use the Clipboard API
        // navigator.clipboard.writeText(this.text)
        //     .then(() => {
        //         console.log('Text copied to clipboard');
        //         alert('Text copied to clipboard: ' + this.text);
        //     })
        //     .catch(err => {
        //     console.error('Failed to copy text: ', err);
        // });
    }
}

export default CopyToClipboard;
