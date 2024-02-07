<style>
    .png-container {
        overflow: hidden;
    }

    .png-container img {
        filter: drop-shadow(0px 1000px 0 red);
        transform: translateY(-1000px);
    }

    /* End About us Custom Css */

    .faq-content-block {
        max-width: 100%;
    }

    .faq-wrapper {
        grid-row-gap: 5px;
    }

    /* End ideology Custom Css */


    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300);

    /*Ignore me, I'm just page styling*/



    #social-platforms {
        position: relative;

    }

    /*Pen code from this point on*/
    .sharebtn {
        clear: both;
        white-space: nowrap;
        font-size: .8em;
        display: inline-block;
        border-radius: 5px;
        box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.35);
        margin: 2px;
        -webkit-transition: all .5s;
        -moz-transition: all .5s;
        transition: all .5s;
        overflow: hidden
    }

    .sharebtn:hover {
        box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.45);
    }

    .sharebtn:focus {
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.4);
    }

    .sharebtn>span,
    .btn-icon>i {
        float: left;
        padding: 13px;
        -webkit-transition: all .5s;
        -moz-transition: all .5s;
        transition: all .5s;
        line-height: 1em
    }

    .sharebtn>span {
        padding: 14px 18px 16px;
        white-space: nowrap;
        color: #FFF;
        background: #b8b8b8
    }

    .sharebtn:focus>span {
        background: #9a9a9a
    }

    .btn-icon>i {
        border-radius: 5px 0 0 5px;
        position: relative;
        width: 13px;
        text-align: center;
        font-size: 1.25em;
        color: #fff;
        background: rgb(22, 50, 122);

    }

    .btn-icon>i:after {
        content: "";
        border: 8px solid;
        border-color: transparent transparent transparent #222;
        position: absolute;
        top: 13px;
        right: -15px
    }

    .btn-icon:hover>i,
    .btn-icon:focus>i {
        color: #FFF
    }

    .btn-icon>span {
        border-radius: 0 5px 5px 0
    }

    /*Facebook*/
    .btn-facebook:hover>i,
    .btn-facebook:focus>i {
        color: #3b5998
    }

    .btn-facebook>span {
        background: #4C69BA
    }

    /*Twitter*/
    .btn-twitter:hover>i,
    .btn-twitter:focus>i {
        color: #55acee
    }

    .btn-twitter>span {
        background: #55acee
    }

    /*Google*/
    .btn-googleplus:hover>i,
    .btn-googleplus:focus>i {
        color: #dd4b39
    }

    .btn-googleplus>span {
        background: #dd4b39
    }

    /*Pinterest*/
    .btn-pinterest:hover>i,
    .btn-pinterest:focus>i {
        color: #cb2028
    }

    .btn-pinterest>span {
        background: #cb2028
    }

    /*LinkedIn*/
    .btn-linkedin:hover>i,
    .btn-linkedin:focus>i {
        color: #007bb6
    }

    .btn-linkedin>span {
        background: #007bb6
    }


    /* hh */
    .read-count {
        margin-left: auto;
    }

    .custom-font-size {
        padding: 1px 15px;
        border-radius: 5px;
        font-weight: 500;
    }

    .custom-post-pera {
        margin: 15px 0;
    }

    .custom-tag-section {
        padding-bottom: 10px;
    }

    /* comment section */
    .custom-form-column {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin: 10px 0;
    }

    @media screen and (max-width: 425px) {
        .custom-form-column {
            flex-wrap: wrap;
        }
    }

    .custom-form-column-inner {
        width: 100%;
        padding: 10px 20px;
    }

    .custom-form-column-textarea {
        width: 100%;
        min-height: 120px;
        padding: 10px 20px;
    }

    .custom-category-style {
        display: inline-block;
        margin: 10px 0;
    }

    @media screen and (max-width: 425px) {
        .single-blog-meta-block.blog-details-meta {
            flex-wrap: wrap;
        }
    }

    .side-post-link {
        font-size: 20px;
        padding: 12px 0;
        font-weight: 300;
        line-height: 1.2;
        align-items: center;
    }

    .popular__post {
        display: flex;
        align-items: center;
        margin-bottom: 30px
    }

    .popular__post__img {
        display: flex;
        width: 80px;
        min-width: 80px;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }
   /* End singel post  Details */
</style>
