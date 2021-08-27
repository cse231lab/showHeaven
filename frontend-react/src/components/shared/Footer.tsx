interface Props {}

function Footer(props: Props): JSX.Element {
  return (
    <>
      <footer className="bg-dark text-light align-bottom mt-auto">
        <div className="container pt-3 pb-3">
          @2021 -ShowHeaven
        </div>
      </footer>
    </>
  );
}

export default Footer;
