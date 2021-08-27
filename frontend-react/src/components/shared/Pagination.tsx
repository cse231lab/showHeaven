interface Props {
  current: number;
  total: number;
  perPage?: number;
  onChange: (page: number) => void;
}

function Pagination(props: Props): JSX.Element {
	let perPage = props.perPage;
  if (!perPage) perPage = 20;
  let pageCnt = Math.ceil(props.total / perPage);

  return (
    <>
      <nav aria-label="Page navigation example">
        <ul className="pagination justify-content-center">
          <li className="page-item disabled">
            <a
              className="page-link text-secondary"
              onClick={() => {
                if (props.current != 1) {
                  props.onChange(props.current - 1);
                }
              }}
              href="#"
              tabIndex={-1}
            >
              Previous
            </a>
          </li>
          {[...Array(pageCnt)].map((x, i) => (
            <li className="page-item">
              <a
                className="page-link text-secondary"
                onClick={() => props.onChange(i + 1)}
                href="#"
              >
                {i + 1}
              </a>
            </li>
          ))}
          <li className="page-item">
            <a
              className="page-link text-secondary"
              onClick={() => {
                if (props.current != pageCnt) {
                  props.onChange(props.current + 1);
                }
              }}
              href="#"
            >
              Next
            </a>
          </li>
        </ul>
      </nav>
    </>
  );
}

export default Pagination;
