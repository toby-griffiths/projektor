export class Project {
  public "@id"?: string;

  constructor(
    _id?: string,
    public name?: string,
    public starts?: Date,
    public ends?: Date
  ) {
    this["@id"] = _id;
  }
}
