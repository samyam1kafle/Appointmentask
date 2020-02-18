<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<style>
    * {
        font-family: calibri;
    }
    .a4print {
        width: 595px;
        height: 842px;
        margin: auto;
        /* background-color: gray; */
    }
    .header {
        width: 100%;
        height: 150px;
        margin-bottom: 30px;
    }
    .photodiv {
        width: 30%;
        height: 150px;
        float: left;
        /* background-color: black; */
    }
    .photo {
        height: 120px;
        width: 120px;
        background-color: gray;
        margin: auto;
        margin-top: 15px;
    }
    .namediv {
        width: 70%;
        height: 150px;
        float: right;
        /* background-color: blue; */
    }
    .name {
        width: 350px;
        height: 70px;
        margin: auto;
        margin-top: 40px;
        font-size: 30px;
        font-weight: bold;
        /* background-color: gray; */
    }
    .name .details {
        width: 100%;
    }
    .fields {
        width: 95%;
        margin: auto;
        height: 50px;
        margin-top: 15px;
    }
    .titlebox {
        width: 27%;
        float: left;
        /* background-color: rebeccapurple; */
        height: 40px;
    }
    .colon {
        width: 3%;
        float: left;
        /* background-color: green; */
        height: 40px;
    }
    .viewbox {
        width: 70%;
        float: right;
        /* background-color: red; */
        height: 40px;
    }
    .fields p {
        font-size: 15px;
        font-weight: bold;
    }
    .fields p2 {
        font-size: 20px;
        font-weight: bold;
    }
</style>
<body>
<div class="a4print">
    <div class="header">
        <div class="photodiv">
            <div class="photo">Photo 120*120</div>
        </div>
        <div class="namediv">
            <div class="name">User Name</div>
        </div>
    </div>
    <div class="details">
        <div class="fields">
            <div class="viewbox">
                <p2>User View</p2>
            </div>
        </div>
        <div class="fields">
            <div class="titlebox">
                <p>User Name</p>
            </div>
            <div class="colon"><p>:</p></div>
            <div class="viewbox">
                <p>
                    {{@Auth::user()->name}}
                </p>
            </div>
        </div>
        <div class="fields">
            <div class="titlebox">
                <p>Task Title</p>
            </div>
            <div class="colon"><p>:</p></div>
            <div class="viewbox">
                <p>
                    {{$todo->title}}
                </p>
            </div>
        </div>
        <div class="fields">
            <div class="titlebox">
                <p>Description</p>
            </div>
            <div class="colon"><p>:</p></div>
            <div class="viewbox">
                <p>
                    {{$todo->description}}
                </p>
            </div>
        </div>
        <div class="fields">
            <div class="titlebox">
                <p>Assign Date</p>
            </div>
            <div class="colon"><p>:</p></div>
            <div class="viewbox">
                <p>
                    {{$todo->assignedDate}}
                </p>
            </div>
        </div>

        <div class="fields">
            <div class="titlebox">
                <p>Assign By</p>
            </div>
            <div class="colon"><p>:</p></div>
            <div class="viewbox">
                <p>
                    {{$todo->requestedBy}}
                </p>
            </div>
        </div>
        <div class="fields">
            <div class="titlebox">
                <p>Deadline</p>
            </div>
            <div class="colon"><p>:</p></div>
            <div class="viewbox">
                <p>
                    {{$todo->DeadLine}}
                </p>
            </div>
        </div>

        <div class="fields">
            <div class="titlebox">
                <p>Remarks</p>
            </div>
            <div class="colon"><p>:</p></div>
            <div class="viewbox">
                <p>
                    {{$todo->remarks}}
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
