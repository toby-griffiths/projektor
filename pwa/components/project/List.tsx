import { FunctionComponent } from "react";
import Link from "next/link";
import ReferenceLinks from "../../components/common/ReferenceLinks";
import { Project } from "../../types/Project";

interface Props {
  projects: Project[];
}

export const List: FunctionComponent<Props> = ({ projects }) => (
  <div>
    <h1>Project List</h1>
    <Link href="/projects/create">
      <a className="btn btn-primary">Create</a>
    </Link>
    <table className="table table-responsive table-striped table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>starts</th>
          <th>ends</th>
          <th />
        </tr>
      </thead>
      <tbody>
        {projects &&
          projects.length !== 0 &&
          projects.map((project) => (
            <tr key={project["@id"]}>
              <th scope="row">
                <ReferenceLinks items={project["@id"]} type="project" />
              </th>
              <td>{project["name"]}</td>
              <td>{project["starts"]}</td>
              <td>{project["ends"]}</td>
              <td>
                <ReferenceLinks
                  items={project["@id"]}
                  type="project"
                  useIcon={true}
                />
              </td>
              <td>
                <Link href={`${project["@id"]}/edit`}>
                  <a>
                    <i className="bi bi-pen" aria-hidden="true" />
                    <span className="sr-only">Edit</span>
                  </a>
                </Link>
              </td>
            </tr>
          ))}
      </tbody>
    </table>
  </div>
);
