import { Head, useForm } from "@inertiajs/react";
import React, { FormEventHandler } from "react";

type Todo = {
  title: string;
  content: string;
  created_at: Date;
  updated_at: Date;
};

export default function Todo({ todos }: { todos: Array<Todo> }) {
  const { data, setData, post, errors } = useForm({
    title: "",
    content: "",
  });

  const onSubmit: FormEventHandler = (e) => {
    e.preventDefault();
    post("/todo");
  };

  const onChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const key = e.target.id;
    const value = e.target.value;
    setData((prev) => ({ ...prev, [key]: value }));
  };

  return (
    <>
      <Head title="Todo" />
      <div>todo</div>
      <form onSubmit={onSubmit}>
        <input
          type="text"
          name="title"
          id="title"
          value={data.title}
          onChange={onChange}
        />
        {errors?.title}
        <input
          type="text"
          name="content"
          id="content"
          value={data.content}
          onChange={onChange}
        />
        {errors?.content}
        <div className="mt-2 cursor-pointer">
          <button
            className="border-2 p-2 border-black rounded-md block"
            type="submit"
          >
            submit
          </button>
        </div>
      </form>
      <div className="mt-12">
        {todos.map((todo: Todo) => (
          <div className="flex gap-2" key={Math.random().toString(36)}>
            <div className="w-fit">{todo.title}</div>
            <div className="w-fit">{todo.content}</div>
          </div>
        ))}
      </div>
    </>
  );
}
