export default class Paginator {

    constructor(data, show){
        this.data = data || [];
        this.show = show || 10;
        this.page = 1;
    }

    get items(){
        return this.data.slice(this.show * (this.page - 1), this.show * this.page);
    }

    get lastPage() {
        return Math.ceil(this.data.length / this.show);
    }
}
