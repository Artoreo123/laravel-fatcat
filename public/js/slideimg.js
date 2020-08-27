// +++++++++++++++++++++++++ index book
var slideIndex = 1;
var default_book_id = document.getElementsByClassName("container-card").length;
// console.log(default_book_id)
for (var i = 1; i <= default_book_id; i++) {
    showDivs(slideIndex, i - 1);
}

function plusDivs(n, bookid) {

    showDivs(slideIndex += n, bookid);

}

//+++++++++++++++++++++++++++ detail book
var slideIndexdetail = 1;
var default_book_detail = document.getElementsByClassName("col-4").length;
for (var x = 1; x <= default_book_detail; x++) {
    // for (var i = 1; i <= default_book_id; i++) {
    showDivsImageDetail(slideIndexdetail, x - 1);
}


function plusDivsBookdetail(n, bookid) {

    showDivsImageDetail(slideIndexdetail += n, bookid);

}

function showDivs(n, bookid) {
    // console.log(n);
    var i;
    var z = document.getElementsByName("book-image[" + bookid + "]");
    // console.log(z);
    if (z.length > 0) {
        if (z.length <= 1) {
            let a = document.getElementsByName("btn-back-book-image[" + bookid + "]");
            a[0].style.display = "none";
            let b = document.getElementsByName("btn-next-book-image[" + bookid + "]");
            b[0].style.display = "none";
        }
        if (n > z.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = z.length
        }
        for (i = 0; i < z.length; i++) {
            z[i].style.display = "none";
        }
        z[slideIndex - 1].style.display = "block";
    } else {
        let a = document.getElementsByName("btn-back-book-image[" + bookid + "]");
        a[0].style.display = "none";
        let b = document.getElementsByName("btn-next-book-image[" + bookid + "]");
        b[0].style.display = "none";
        // let c = "/images/no-image-1.jpg"
        // document.getElementById("no-image").innerHTML = c;

    }
}

function showDivsImageDetail(n, bookid) {
    //console.log(n);
    var j;
    var zz = document.getElementsByName("book-detail-image[" + bookid + "]");

    if (zz.length > 0) {
        if (zz.length <= 1) {
            let aa = document.getElementsByName("btn-back-book-detail-image[" + bookid + "]");
            aa[0].style.display = "none";
            let bb = document.getElementsByName("btn-next-book-detail-image[" + bookid + "]");
            bb[0].style.display = "none";
        }
        if (n > zz.length) {
            slideIndexdetail = 1
        }
        if (n < 1) {
            slideIndexdetail = zz.length
        }
        for (j = 0; j < zz.length; j++) {
            zz[j].style.display = "none";
            // console.log(zz[j]);
        }
        zz[slideIndexdetail - 1].style.display = "block";
    } else {
        let aa = document.getElementsByName("btn-back-book-detail-image[" + bookid + "]");
        aa[0].style.display = "none";
        let bb = document.getElementsByName("btn-next-book-detail-image[" + bookid + "]");
        bb[0].style.display = "none";
        // let c = "/images/no-image-1.jpg"
        // document.getElementById("no-image").innerHTML = c;

    }
}
