import { Head } from "@inertiajs/react";

export default function TodoDetail({ todo }) {
  return (
    <>
      <Head title="Todo" />
      <div className="p-4">
        {Object.keys(todo).map((key) => (
          <div className="flex" key={key}>
            <div>{key}</div>
            <div>{todo[key]}</div>
          </div>
        ))}
      </div>
    </>
  );
}
