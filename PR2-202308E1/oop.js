class vision{
    constructor(projectName,compnayName){
        this.pName=projectName;
        this.cName=compnayName;
        // alert("this is constructor method");
    }

    projectDisplay(proType){
        alert(this.pName+" project is the "+ proType +" project and displaying in APtech VISION");
    }

    jobFair(hiring){
        alert(this.cName+" joined job Fair 2024 in Aptech and they hired almost "+hiring+" students for job on bases of "+this.pName);

    }
}

let ob1 = new vision("event organization", "softTech");
ob1.projectDisplay("web designing");
let ob2 = new vision("car tracker"," brainTechie");
ob2.projectDisplay("mobile application")
ob2.jobFair(5);